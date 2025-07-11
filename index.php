<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    if (!isset($_SESSION['comment'])) {
        $_SESSION['comment'] = array();
    }
    $_SESSION['comment'][] = [
      'name'=>htmlspecialchars($name),
      'comment'=>htmlspecialchars($comment)
    ];
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مقالات</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>به سایت مقاله‌نویسی ما خوش آمدید</h1>
    <nav>
        <ul>
            <li><a href="#">خانه</a></li>
            <li><a href="#">مقالات</a></li>
            <li><a href="#">درباره ما</a></li>
            <li><a href="#">تماس با ما</a></li>
        </ul>
    </nav>
    <pre dir="ltr">
        <?php
        print_r($_SESSION);
        ?>
    </pre>
</header>

<main>
    <section>
        <h2>بخش مقالات</h2>
        <p>
            اینجا می‌تونید جدیدترین مقالات را بخوانید.
            ما به‌صورت روزانه مقاله‌های جدید منتشر می‌کنیم.
        </p>
        <article>
            <h3>عنوان مقاله اول</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut, eaque enim error ex ipsa...
            </p>
        </article>
        <article>
            <h3>عنوان مقاله دوم</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quisquam, repudiandae?
            </p>
        </article>
    </section>
</main>

<footer>
    <h3>بخش نظرات</h3>
    <form action="index.php" method="post">
        <label for="name">نام شما:</label>
        <input type="text" id="name" name="name" placeholder="نام خود را وارد کنید..." required>

        <label for="comment">نظرات خود را با ما به اشتراک بگذارید:</label>
        <input type="text" id="comment" name="comment" placeholder="نظر خود را بنویسید..." required>

        <button type="submit">ارسال نظر</button>
    </form>

    <!-- نظرات ثبت شده -->
    <div class="comments">
        <h4>نظرات کاربران:</h4>
        <ul>
            <?php if (isset($_SESSION['comment'])) : ?>
            <?php foreach ($_SESSION['comment'] as $comment) : ?>
            <li>
                <strong><?= $comment['name'];?> : </strong><?= $comment['comment'];?>
            </li>
        <?php endforeach; ?>
            <?php else: ?>
            <li>نظری ثبت نشده است</li>
            <?php endif;?>
        </ul>
    </div>

    <p>© 2025 تمامی حقوق محفوظ است</p>
</footer>

</body>
</html>
