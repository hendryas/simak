<!doctype html>
<html ⚡ lang="en">

<head>
    <meta charset="utf-8">

    <title>Travel</title>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <!-- ## Setup -->
    <!--
        All additionally used AMP components must be imported in the header. Import `amp-social-share` for adding share buttons-->
    <script async custom-element="amp-social-share"
        src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
    <!-- Import `amp-iframe` to embed an interactive chart -->
    <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
    <!-- Import `amp-carousel` to implement an image gallery -->
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
    <!-- Import `amp-user-notification` to display a cookie notification -->
    <script async custom-element="amp-user-notification"
        src="https://cdn.ampproject.org/v0/amp-user-notification-0.1.js"></script>
    <!-- Import `amp-list` to get a fresh a list of related articles -->
    <script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
    <!-- Import `amp-mustache` as a format template for `amp-list` -->
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
    <!-- Import `amp-analytics` for tracking usage -->
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <!-- Import `amp-ad` to display ads -->
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

    <link rel="canonical" href="<% canonical %>">

    <!-- ## Metadata -->
    <!-- The Top Stories carousel requires schema.org markup for one of the following types: Article, NewsArticle, BlogPosting, or VideoObject. [Learn more](https://developers.google.com/structured-data/carousels/top-stories#markup_specification).  -->
    <script type="application/ld+json">
{
      "@context": "http://schema.org",
      "@type": "NewsArticle",
      "mainEntityOfPage": "<% hosts.platform %>/samples_templates/news_article/",
      "headline": "Lorem Ipsum",
      "datePublished": "2016-04-21T11:55:02Z",
      "dateModified": "2016-04-21T11:55:02Z",
      "description": "A sample news article build with AMP.",
      "author": {
        "@type": "Person",
        "name": "Sebastian Benz"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Google",
        "logo": {
          "@type": "ImageObject",
          "url": "http://cdn.ampproject.org/logo.jpg",
          "width": 600,
          "height": 60
        }
      },
      "image": {
        "@type": "ImageObject",
        "url": "/static/samples/img/landscape_lake_1280x857.jpg",
        "height": 1280,
        "width": 857
      }
    }
      </script>
    <meta name="viewport" content="width=device-width" initial-scale=1>
    <style amp-boilerplate>
        body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }
    </style><noscript>
        <style amp-boilerplate>
            body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }
        </style>
    </noscript>
    <style amp-custom>
        html {
            font-size: 14px;
        }

        amp-img {
            /*border: 12px solid #ccc;*/
            border-radius: 5px;
        }

        :root {
            --color-primary: #005AF0;
            --color-text-light: #fff;
            --color-text-dark: #000;
            --color-bg-light: #FAFAFC;

            --space-1: .5rem;
            /* 8px */
            --space-2: 1rem;
            /* 16px */

            --box-shadow-1: 0 1px 1px 0 rgba(0, 0, 0, .14), 0 1px 1px -1px rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
        }

        .figure {
            margin: var(--space-2) 0;
            padding: 0;
        }

        .figure>figcaption {
            padding: var(--space-1) var(--space-2);
        }

        .amp-ad-container {
            display: flex;
            margin: 0 auto;
        }

        .carousel .slide>amp-img>img {
            object-fit: contain;
        }

        .heading {
            padding-bottom: var(--space-1);
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .heading h1 {
            font-size: 2.2rem;
            line-height: 3.0rem;
            margin-bottom: var(--space-2);
        }

        .heading>#summary {
            font-weight: 500;
        }

        .heading>small {
            color: var(--color-primary);
        }

        .related {
            background-color: var(--color-bg-light);
            margin: var(--space-1);
            display: flex;
            color: var(--color-text-dark);
            padding: 0;
            box-shadow: var(--box-shadow-1);
            text-decoration: none;
        }

        .related>span {
            font-weight: 400;
            margin: var(--space-1);
        }

        .related:hover {
            background-color: var(--color-bg-light);
        }

        .cookie-disclaimer {
            padding: var(--space-1);
            background: var(--color-bg-light);
            text-align: center;
            color: var(--color-text-dark);
            border-top: 1px solid var(--color-text-dark);
        }

        h1 {
            margin-block-end: 0.1em;
        }

        .width-grid {
            width: calc(50% - 8px);
        }

        @media screen and (min-width: 1025px) {
            .container {
                width: 1024px;
                margin-left: calc((100% - 1024px)/2);
            }

            html {
                font-size: 20px;
            }

            .width-grid {
                width: calc(25% - 8px);
            }
        }

        .top-bck {
            background-color: #006778;
            padding: 10px;
            color: #fff;
        }

        .title-div {
            margin-bottom: 20px;
            float: left;
            border-bottom: 5px #FFD124 solid;
        }

        .alink-title {
            text-decoration: none;
            color: #fff;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="top-bck">
            <div style="float:left">
                <a class="alink-title" href="index.html">
                    <img src="img/logo4.webp" height="75px">
                </a>
            </div>
            <!-- <div style="float:left;margin-left:5px;margin-top:-10px">
                <h1><a class="alink-title" href="index.html">Travel</a></h1>
            </div> -->
            <div style="clear:left;height:1px;">&nbsp;</div>
        </div>
        <div style="">

            <amp-carousel width="16" height="9" layout="responsive" type="slides" role="region"
                aria-label="type='slides' carousel">
                <amp-img src="img/mazda-cx-5-2022-2.png" width="160" height="120" layout="responsive"
                    alt="a sample image">
                </amp-img>
                <amp-img src="img/mitsubishi-ramaikan-pameran-iims-hybrid-2022_169.jpeg" width="160" height="120"
                    layout="responsive" alt="another sample image">
                </amp-img>
                <amp-img src="img/si-kuning-morris-garage-5-gt-dijual-mulai-rp-3399-juta_169.jpeg" width="160"
                    height="120" layout="responsive" alt="and another sample image">
                </amp-img>
            </amp-carousel>

        </div>
        <!-- -->
        <main>
            <div style="padding-left: 10px;">
                <div class="title-div">
                    <h2 style="margin-block-end: 0.0005em;">Articles</h2>
                </div>
                <div style="clear: left;height: 1px;">&nbsp;</div>
            </div>


            <div class="width-grid" style="float:left;padding-left:5px;padding-top: 5px;padding-bottom: 5px;">
                <div style="width: calc(100% - 24px);border-radius: 10px;padding: 10px;border: solid 1px #00AFC1;">
                    <div><a href="detail.html">
                            <img width="100%" src="img/chery-omoda-5-mulai-diproduksi.jpeg">
                        </a>
                    </div>
                    <div style="font-weight: 700;">
                        Chery Balik ke Indonesia, Enggak Takut Gagal Lagi, Nih?
                    </div>
                </div>
            </div>
            <div class="width-grid" style="float:left;padding-left:5px;padding-top: 5px;padding-bottom: 5px;">
                <div style="width: calc(100% - 24px);border-radius: 10px;padding: 10px;border: solid 1px #00AFC1;">
                    <div><a href="detail.html">
                            <img width="100%" src="img/hyundai-ioniq-5-1.jpeg">
                        </a>
                    </div>
                    <div style="font-weight: 700;">
                        Chery Balik ke Indonesia, Enggak Takut Gagal Lagi, Nih?
                    </div>
                </div>
            </div>
            <div class="width-grid" style="float:left;padding-left:5px;padding-top: 5px;padding-bottom: 5px;">
                <div style="width: calc(100% - 24px);border-radius: 10px;padding: 10px;border: solid 1px #00AFC1;">
                    <div><a href="detail.html">
                            <img width="100%"
                                src="img/begini-tampang-hyundai-ioniq-5-mobil-listrik-buatan-indonesia_169.jpeg">
                        </a>
                    </div>
                    <div style="font-weight: 700;">
                        Chery Balik ke Indonesia, Enggak Takut Gagal Lagi, Nih?
                    </div>
                </div>
            </div>
            <div class="width-grid" style="float:left;padding-left:5px;padding-top: 5px;padding-bottom: 5px;">
                <div style="width: calc(100% - 24px);border-radius: 10px;padding: 10px;border: solid 1px #00AFC1;">
                    <div><a href="detail.html">
                            <img width="100%"
                                src="img/buka-pameran-iims-2022-menko.jpeg">
                        </a>
                    </div>
                    <div style="font-weight: 700;">
                        Chery Balik ke Indonesia, Enggak Takut Gagal Lagi, Nih?
                    </div>
                </div>
            </div>

        </main>

        <!-- ## Cookie consent -->
        <!-- Use `amp-user-notification` to implement a cookie consent form (if needed). By default, the AMP runtime doesn't use cookies. Some analytics vendors might use require cookies though. Learn more about `amp-user-notification` [here](/documentation/components/reference/amp-user-notification.html) -->
        <amp-user-notification class="cookie-disclaimer" layout="nodisplay" id="amp-user-notification1">
            This page might use cookies if your analytics vendor requires them.
            <button on="tap:amp-user-notification1.dismiss">Accept</button>
        </amp-user-notification>

        <!-- ## User analytics -->
        <!-- Analytics must be configured in the body. Here we use Google Analytics to track pageviews.  -->
        <amp-analytics type="googleanalytics">
            <script type="application/json">
{
          "vars": {
            "account": "UA-73836974-1"
          },
          "triggers": {
            "default pageview": {
              "on": "visible",
              "request": "pageview",
              "vars": {
                "title": "{{title}}"
              }
            }
          }
        }
        </script>
        </amp-analytics>
    </div>
    <div style="height: 50px;">&nbsp;</div>
</body>

</html>