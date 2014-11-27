<!DOCTYPE html>

<html>

    <head>

        <meta charset=<?php echo $charset; ?>" />
              <title><?php echo $title; ?></title>
              <?php
              if (!empty($meta))
                  foreach ($meta as $name => $metaTag) {
                      echo "\n\t\t";
                      echo $metaTag;
                  }
              echo "\n";

              if (!empty($canonical)) {
                  echo "\n\t\t";
                  ?><link rel="canonical" href="<?php echo $canonical; ?>" /><?php
              }
              echo "\n\t";

              foreach ($css as $file) {
                  echo "\n\t\t";
                  ?><link rel="stylesheet" href="<?php echo css_url() . $file; ?>" type="text/css" /><?php
              } echo "\n\t";

              foreach ($header_js as $file) {
                  echo "\n\t\t";
                  ?><script src="<?php echo js_url() . $file; ?>"></script><?php
        } echo "\n\t";
        ?>

    </head>

    <body>

        <div id="container">

            <header>

                <!--header start here -->

                <?php echo $_header; ?>

                <!-- header end-->

            </header>

            <nav>

                <!-- Top Menu Start Here -->

                <?php echo $_top_menu; ?>

                <!-- Top Menu End Here -->

            </nav>

            <section>

                <div id="content">

                    <!-- Content Start Here -->

                    <?php echo $_content; ?>

                    <!-- Content End Here -->

                </div>

                <div class="sidebar">

                    <!-- sidebar star here -->

                    <?php echo $_sidebar; ?>

                    <!-- sidebar end here -->

                </div>

            </section>

            <footer>

                <div class="footer-bottom">

                    <!-- Footer Start Here -->

                    <?php echo $_footer; ?>

                    <!-- Footer End Here -->

                </div>
            </footer>

        </div>

    </body>

</html>
