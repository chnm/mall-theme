<?php include('header.php'); ?>
<body class="home">

    <header>
        <h1 id="site-title"><div class="logo"></div><a href="index">Hidden Histories<br>of the<br> National Mall</a></h1>
        
        <?php include('search.php'); ?>
        
        <?php include('navigation.php'); ?>
    </header>

    <div role="main">
    
        <div id="intro">
            <h1>'Hidden Histories' is a discovery tool for the National Mall.</h1>
            <p>Donec ullamcorper nulla non metus auctor fringilla. Donec sed odio dui.</p>
            <p><a href="about" class="button">Learn more about the project.</a></p>
        </div>
                
        <div id="featured-question">
            <h1>
                <span class="category">Featured question</span>
                <span class="title">Were there ever stores on the National Mall?</span>
            </h1>
            <p>Center Market, the city's oldest shopping venue,  operated for 120 years on the edge of the National Mall on Pennsylvania Avenue. George Washington had set aside land for the market in 1797.</p>
            <p class="jump-link"><a href="#" class="button">Read more</a></p>
        </div>

    </div>
<?php include('footer.php'); ?>