<?php require 'src/init-feedback.php';?>
<?php include 'src/header.php'; ?>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <h1 class="mt-5">Добавить отзыв</h1>
            
            <?php if(!empty($error)): ?>
                <div class="alert alert-warning"><?= $error ?></div>
            <?php endif ?>
            
            <div class="feedback-index p-3">
                <form id="w0" action="" method="post" enctype="multipart/form-data" class="mb-5">
                    <input type="hidden" name="_csrf" value="Y8NMvvT3LR7_0FE4QlfcxYPKc6Y2OK44IrCGNdMqbagnjTjstcRneKWCP3EvEIap9vpLxXJbx1sS4-9C6ksc4w==">
                    
                    <div class="mb-3 field-feedback-fio required">
                        <label class="form-label" for="feedback-fio">фио</label>
                        <input type="text" id="feedback-fio" class="form-control" name="name" value="<?= $feedback->getName() ?? '' ?>" aria-required="true">
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3 field-feedback-phone required">
                        <label class="form-label" for="feedback-phone">телефон</label>
                        <input type="text" id="feedback-phone" class="form-control" name="phone" value="<?= $feedback->getPhone() ?? '' ?>" aria-required="true" data-plugin-inputmask="inputmask_f59f28e6">
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3 field-feedback-text required">
                        <label class="form-label" for="feedback-text">отзыв</label>
                        <textarea id="feedback-text" class="form-control" name="feedback" aria-required="true"><?= $feedback->getFeedback() ?? '' ?></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3 field-feedback-imagefile">
                        <label class="form-label" for="feedback-imagefile">фото</label>
                        <input type="file" id="feedback-imagefile" class="form-control" name="img">
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3 field-feedback-agree required">
                        <div class="form-check">
                            <input type="hidden" name="agree" value="0">
                            <input type="checkbox" id="feedback-agree" class="form-check-input" name="agree" value="1" aria-required="true">
                            <label class="form-check-label" for="feedback-agree">Согласие на обработку персональных данных</label>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <button type="submit" class="btn btn-primary">отправить</button>
                    </div>
                </form>

                <h2 class="h4 mb-3">Отзывы наших клиентов</h2>
                
                <?php foreach($feedbacks as $item): ?>
                    <?php 
                    if (!isset($item['status']) || $item['status'] != 1) {
                        continue;
                    }
                    ?>
                    <div class="card mb-3" style="max-width: 800px;">
                        <div class="row g-0 align-items-center">
                            
                            <div class="col-md-3 text-center p-3">
                                <?php if (!empty($item['img'])): ?>
                                    <img src="uploads/<?= $item['img'] ?>" class="img-fluid rounded" alt="Фото работы" style="max-height: 150px; object-fit: cover;">
                                <?php else: ?>
                                    <img src="uploads/no-image.jpg" class="img-fluid rounded" alt="Нет фото" style="max-height: 150px; object-fit: cover;">
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($item['feedback']) ?></p>
                                    <small class="text-muted"><?= htmlspecialchars($item['phone']) ?></small>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </main>

<?php include 'src/footer.php'; ?>
