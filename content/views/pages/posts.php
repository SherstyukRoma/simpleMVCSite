<section class="feature_wrap padding-half">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="heading ">Наши блюда</h2>
                <hr class="heading_space">
                <p>Вернитесь на <a href="/">главную</a></p>
            </div>
        </div>
    </div>
</section>
<section id="blog" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <?php
                for ($i = 0; $i < count($data['posts']); $i++) {

                ?>
                    <div class="blog_item padding-bottom">
                        <h2><?php echo $data['posts'][$i]['title'] ?></h2>
                        <ul class="comments">
                            <li><a href="#.">Nov 10, 2016</a></li>
                            <li><a href="#."><i class="icon-chat-2"></i>5</a></li>
                        </ul>
                        <div class="image_container">
                            <img src="<?php echo $data['posts'][$i]['imgsrc'] ?>" class="img-responsive" alt="<?php echo $data['posts'][$i]['imgalt'] ?>">
                        </div>
                        <p><?php echo $data['posts'][$i]['slogan'] ?></p>
                        <a class="btn-common button3" href="/post/getpost/?post=<?php echo $data['posts'][$i]['id'] ?>">Подробнее...</a>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-md-4 col-sm-5">
                <aside class="sidebar">
                    <div class="widget">
                        <h3>Категории</h3>
                        <ul class="widget_links">
                            <li><a href="#.">Food</a></li>
                            <li><a href="#.">Special Occasion</a></li>
                            <li><a href="#.">Presentation</a></li>
                            <li><a href="#.">Corporate Dining</a></li>
                            <li><a href="#.">Reservation</a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h3>Tags</h3>
                        <ul class="tags">
                            <li><a href="#.">Our Events</a></li>
                            <li><a href="#.">Lorem ipsum</a></li>
                            <li><a href="#.">sit amet</a></li>
                            <li><a href="#.">Lorem ipsum </a></li>
                            <li><a href="#.">Presentation</a></li>
                            <li><a href="#.">Reservation</a></li>
                            <li><a href="#.">Special Occasion</a></li>
                            <li><a href="#."> Lunch</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="/post/?page=1">В начало</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="/post/?cpage=1">1</a></li>
                        <li class="page-item"><a class="page-link" href="/post/?cpage=2">2</a></li>
                        <li class="page-item"><a class="page-link" href="/post/?cpage=3">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="/post/?cpage=1">В конец</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>