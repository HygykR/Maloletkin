<?php

namespace src\services;

use mysqli_result;
use src\exceptions\DbExceptions;

class Db extends \mysqli
{
    public function __construct($config)
    {
        try {
            parent::__construct($config['hostname'], $config['username'], $config['password'], $config['database']);
        } catch (\mysqli_sql_exception $e) {
            throw new DbExceptions('Ошибка при подключении к базе данных: ' . $e->getMessage());
        }
    }

    public function querySql(string $sql, array $params = []): array|bool
    {
        if (empty($params)) {
            $result = parent::query($sql);
            if (is_bool($result)) {
                return $result;
            }
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        $stmt = parent::prepare($sql);
        if (!$stmt) {
            return false;
        }

        $types = '';
        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= 'i';
            } elseif (is_float($param)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
        }

        $stmt->bind_param($types, ...$params);
        
        // Выполняем запрос
        if (!$stmt->execute()) {
            return false;
        }

        $result = $stmt->get_result();
        if (is_bool($result)) {
            return $result;
        }
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
