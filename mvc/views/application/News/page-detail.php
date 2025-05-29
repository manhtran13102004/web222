<div class="page-wrapper">
    <?php 
      require_once "./mvc/views/".$data["header"].".php";
    ?>
    <main class="page-main">
        <div class="section-first-screen">
            <div class="first-screen__bg hide-in-sd" style="background-color: rgba(86, 178, 128, 15%); height: 300px;">
            </div>
            <div class="first-screen__content hide-in-sd" style="height: 300px;">
                <div class="uk-container" style="padding: 32px 0">
                    <div class="first-screen__box page-info">
                        <h2 class="first-screen-page" style="color: #008848; font-size: 50px; text-align: center" >Bài viết</h2>
                    </div>
                </div>
            </div>
            <?php
            while ($row = mysqli_fetch_assoc($data["id"])){
            ?>
            <div class="page-content">
                <div class="uk-margin-large-top uk-container uk-container-small">
                    <div class="article-full__info" style="justify-content:space-between !important">
                        <a href="http://localhost:8080/web222/news" style="text-decoration:none">
                            <i class="fas fa-arrow-left"></i>
                            <span style="color: #56b280">Back to all news</span>
                        </a>
                    </div>
                    <article class="article-full">

                        <div class="article-full__info">
                            <div class="article-full__author"><i class="fas fa-user "></i><span>By Minh Khiêm</span>
                            </div>
                            <div class="article-full__category"><i class="fas fa-folder-open"></i><span>Posted in
                                    Event</span></div>
                            <div class="article-full__date"><i class="fas fa-calendar-alt"></i><span>April 25,
                                    2023</span>
                            </div>
                            <div class="article-full__comments"><i class="fas fa-comment"></i><span>10</span></div>
                        </div>
                        <div class="article-full__image">
                        </div>
                        <div>
                            <h1><b><?php echo $row["header_news"] ?></b></h1>
                            <p style="font-size: 16.5px; font-weight: bold; text-align: justify;">
                                <?php echo $row["intro_news"] ?></p>
                            <div><img class="uk-width-1-1" src="<?php echo $row["img_news"] ?> " alt="article"></div>
                            <p><?php echo $row["content_news"] ?></p>

                            <div class="article-full__bottom">
                                <div class="article-full__tags">
                                    <div> <i class="fas fa-tags"></i><strong>Từ khóa</strong></div><span>TIN TỨC, NÔNG
                                        SẢN, TRÁI CÂY</span>
                                </div>
                                <div class="article-full__share">
                                    <div> <strong>Chia sẻ</strong><i class="fas fa-share-alt"></i></div>
                                    <ul>
                                        <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <?php
            }
            ?>
    </main>
    <?php 
      require_once "./mvc/views/".$data["footer"].".php";
    ?>
</div>