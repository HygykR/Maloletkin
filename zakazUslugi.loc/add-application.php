<?php require 'src/init-addApplication.php'; ?>
<?php include 'src/header.php'; ?>
    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <h1 class="mt-5">Подать заявку</h1>

            <?php if(!empty($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <?php if(!empty($flash)): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?= htmlspecialchars($flash) ?>
            </div>
            <?php endif; ?>

            <div class="feedback-index p-3">
                <form id="w0" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_csrf"
                        value="Y8NMvvT3LR7_0FE4QlfcxYPKc6Y2OK44IrCGNdMqbagnjTjstcRneKWCP3EvEIap9vpLxXJbx1sS4-9C6ksc4w==">
                    
                    <div class="mb-3 field-feedback-fio required">
                        <label class="form-label" for="app-date">Выберите дату</label>
                        <input type="date" id="app-date" class="form-control" name="date" value="" aria-required="true">
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3 field-feedback-fio required">
                        <label class="form-label" for="app-time">Выберите время посещения</label>
                        <input type="time" id="app-time" class="form-control" name="time" value="" aria-required="true">
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3 field-feedback-fio required">
                        <label class="form-label" for="feedback-fio">Причина обращения (кратко)</label>
                        <input type="text" id="feedback-fio" class="form-control" name="reason" value=""  aria-required="true">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3 field-feedback-text required">
                        <label class="form-label" for="feedback-text">Причина посещения (подробно)</label>
                        <textarea id="feedback-text" class="form-control" name="text" 
                            aria-required="true"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">отправить заявку</button>
                    </div>
                </form>
            </div><!-- feedback-index -->
        </div>
    </main>

<?php include 'src/footer.php' ?>
