<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&display=swap");

        .li-container {
            width: 25%;
        }

        .logo h1 {
            font-family: "Dongle", sans-serif;
            position: absolute;
            top: 20%;
            left: 40%;
            font-size: 5rem;
        }

        li {
            padding: 0 !important;
        }

        li .wrapper {
            display: block;
            height: 100%;
            width: auto;
            position: relative;
            -webkit-transition: -webkit-transform 300ms ease;
            -moz-transition: -moz-transform 300ms ease;
            transition: transform 300ms ease;
        }

        .wrapper .go,
        .wrapper .item,
        .wrapper .del {
            display: inline-block;
            padding: 0.9em;
            text-shadow: none;
            border-style: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .wrapper .item {
            width: 100%;
            height: 100%;
        }

        .wrapper .go,
        .wrapper .del {
            height: 100%;
            text-align: center;
            font-weight: bold;
            border-width: 1px 0;
            border-style: solid;
            border-color: #ddd;
        }

        .wrapper .go {
            background: #009925;
            border-color: #009925;
        }

        .wrapper .del {
            background: #f90101;
            border-color: #f90101;
        }

        @media (max-width: 320px) {
            .logo h1 {
                font-size: 4rem;
                left: 16%;
                top: 28%;
            }

            .li-container {
                width: 70%;
            }
        }

        @media (max-width: 424px) and (min-width: 321px) {
            .logo h1 {
                font-size: 4rem;
                left: 22%;
                top: 28%;
            }

            .li-container {
                width: 70%;
            }
        }

        @media (max-width: 600px) and (min-width: 425px) {
            .logo h1 {
                font-size: 4rem;
                left: 22%;
                top: 28%;
            }

            .li-container {
                width: 70%;
            }
        }
    </style>
</head>

<body>
    <div data-role="page" class="bg-light">
        <div class="logo">
            <h1>FACECRUSH</h1>
        </div>
        <!-- <div data-role="header" data-position="fixed">
        <h1>Header</h1>
      </div> -->
        <div class="__main-container">
            <div role="main" class="ui-content container li-container">
                <ul data-role="listview">
                    <!-- <li>Item 1</li> -->
                    <li class="btn btn-danger text-center" style="margin-top: 15rem" id="modalContent">
                        VERSION
                    </li>
                </ul>
            </div>
        </div>
        <!-- <div
        data-role="footer"
        data-position="fixed"
        data-theme="a"
        data-tap-toggle="false"
      >
        <h1>Footer</h1>
      </div> -->
    </div>
</body>
<script>
    $.fn.extend({
        createBtn: function() {
            var elmWidth = $("li", $(this)).width(),
                listType = $(this).listview("option", "inset") ? true : false,
                btnWidth =
                elmWidth < 300 && listType ?
                "35%" :
                elmWidth > 300 && !listType ?
                "25%" :
                "20%";
            $("li", $(this)).each(function() {
                var text = $(this).html();
                $(this).html(
                    $("<div/>", {
                        class: "wrapper",
                    })
                    .append(
                        $("<div/>", {
                            class: "go",
                        })
                        .text("BOY")
                        .width(btnWidth)
                    )
                    .append(
                        $("<div/>", {
                            class: "item",
                        }).text(text)
                    )
                    .append(
                        $("<div/>", {
                            class: "del",
                        })
                        .text("GIRL")
                        .width(btnWidth)
                    )
                    .css({
                        left: "-" + btnWidth,
                    })
                    .on("swipeleft swiperight vclick tap", function(e) {
                        $(this).revealBtn(e, btnWidth);
                    }) /**/
                );
            });
        },
        revealBtn: function(e, x) {
            var check = this.check(x),
                swipe = e.type;
            if (check == "closed") {
                swipe == "swiperight" ?
                    this.open(e, x, "left") :
                    swipe == "swipeleft" ?
                    this.open(e, x, "right") :
                    setTimeout(function() {
                        this.close(e);
                    }, 0);
                e.stopImmediatePropagation();
            }
            if (check == "right" || check == "left") {
                swipe == "swiperight" ?
                    this.open(e, "left") :
                    swipe == "swipeleft" ?
                    this.open(e, x, "right") :
                    setTimeout(function() {
                        this.close(e);
                    }, 0);
                e.stopImmediatePropagation();
            }
            if (
                check !== "closed" &&
                e.isImmediatePropagationStopped() &&
                (swipe == "vclick" || swipe == "tap")
            ) {
                this.close(e);
            }
        },
        close: function(e) {
            var check = this.check();
            this.css({
                transform: "translateX(0)",
            });
        },
        open: function(e, x, dir) {
            var posX = dir == "left" ? x : "-" + x;
            if (dir == "left") {
                $(location).prop("href", "boy.php");
                // boysversion
            } else {
                $(location).prop("href", "girl.php");
                // girlsVersion
            }
            $(this).css({
                transform: "translateX(" + posX + ")",
            });
        },
        check: function(x) {
            var matrix = this.css("transform").split(" "),
                posY = parseInt(matrix[matrix.length - 2], 10),
                btnW = (this.width() * parseInt(x)) / 100 / 1.1;
            return isNaN(posY) ?
                "closed" :
                posY >= btnW ?
                "left" :
                posY <= "-" + btnW ?
                "right" :
                "closed";
        },
    });

    $(document).on("pagecreate", function() {
        $("ul").createBtn();
    });
</script>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>

</html>