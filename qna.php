<?php
require_once 'functions.php';
require_once 'QnAService.php';

$activePage = 'qna';
$qnaService = new QnA('qna.json');
$qnaItems = $qnaService->getAllQuestionsAndAnswers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>QnA</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="top-text header-text">
                        <h6>Najcastejsie otazky</h6>
                        <h2>Otazky a odpovede</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="category-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if (empty($qnaItems)): ?>
                        <p>Nepodarilo sa nacitat ziadne otazky a odpovede.</p>
                    <?php else: ?>
                        <?php foreach ($qnaItems as $item): ?>
                            <div class="mb-4 p-4" style="background: #f7f7f7; border-radius: 10px;">
                                <h4><?php echo htmlspecialchars($item['question']); ?></h4>
                                <p class="mb-0"><?php echo htmlspecialchars($item['answer']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.html'; ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
