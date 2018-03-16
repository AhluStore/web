<!DOCTYPE html>
<html>
  <head>
	<base href="<?php echo site_url_theme("maintain/") ?>" target="_self" />
    <?php echo !empty($theme->seo)? $theme->seo : ""; ?>
    <link rel="stylesheet" type="text/css" href="main.css">
  </head>

  <body>
    <div class="page-wrapper">

      <header>
        <div class="container container--header">
          <img src="<?php echo site_url_theme("logo_ahlu.gif")  ?>" alt="<?php echo THEME; ?>" />
        </div>
      </header>

      <section class="background-marble">

        <div class="container">
          <div class="section__title text-center">
            <h1>Thanks for Visiting!</h1>
            <p>Our website is being updated and will be back shortly.</p>
          </div>
        </div>

        <div class="container container--white container--border">
          
          <div class="grid grid--padded">
            <div class="inner__image w-md-6 grid__item text-center">
              <img src="images/maintenance-carrot.png" />
            </div>

            <div class="inner__content w-md-6 grid__item">
              <h2>Got any questions?</h2>
              <ul class="contact-info">
                <li>
                  <div class="icon">
                    <img src="images/maintenance-mail.png" />
                  </div>
                  <div class="info">
                    Email us<br />
                    <a href="mailto:admin@ahlustore.com" target="_blank">admin@ahlustore.com</a>
                  </div>
                </li>
                <li>
                  <div class="icon">
                    <img src="images/maintenance-phone.png" />
                  </div>
                  <div class="info">
                    Call us<br />
                    <a href="tel:84-0909-656-119">+84 0909 656 119</a>
                  </div>
                </li>
                <li>
                  <div class="icon">
                    <img src="images/maintenance-twitter.png" />
                  </div>
                  <div class="info">
                    Ask us<br />
                    <a href="https://twitter.com/ahlustore" target="_blank">@AhlustoreTeam</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="container text-center">
          
          <div class="inner__title">
            <h2>While you wait...</h2>
            Follow us on
          </div>

          <div class="social__content">
            <ul>
              <li>
                <a href="https://www.facebook.com/ahlustore" target="_blank">
                  <img src="images/maintenance-share-facebook.png" />
                </a>
              </li>
              <li>
                <a href="https://twitter.com/ahlustore" target="_blank">
                  <img src="images/maintenance-share-twitter.png" />
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/ahlustore/" target="_blank">
                  <img src="images/maintenance-share-instagram.png" />
                </a>
              </li>
            </ul>
          </div>

        </div>

      </section>

    </div>
  </body>

</html>
