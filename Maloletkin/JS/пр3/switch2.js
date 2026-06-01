function getMonthName(monthNumber) {
  if (monthNumber === 1) {
    return "Январь";
  } else if (monthNumber === 2) {
    return "Февраль";
  } else if (monthNumber === 3) {
    return "Март";
  } else if (monthNumber === 4) {
    return "Апрель";
  } else if (monthNumber === 5) {
    return "Май";
  } else if (monthNumber === 6) {
    return "Июнь";
  } else if (monthNumber === 7) {
    return "Июль";
  } else if (monthNumber === 8) {
    return "Август";
  } else if (monthNumber === 9) {
    return "Сентябрь";
  } else if (monthNumber === 10) {
    return "Октябрь";
  } else if (monthNumber === 11) {
    return "Ноябрь";
  } else if (monthNumber === 12) {
    return "Декабрь";
  } else {
    return "Неверный номер месяца. Введите число от 1 до 12.";
  }
}
console.log(getMonthName(10))