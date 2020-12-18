<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:: VietCatholic News ::</title>
    <script type="text/javascript">
        function viewSize() {
            return $('#sizer').find('div:visible').data('size');
        }

        $(document).ready(function () {

            $.get('/Js/navnews.html', function (data) {
                var vs = viewSize();
                if (vs == "lg" || vs == "xl") {
                    $('#navbar').html(data);
                }
                else {
                    $('#nav').html(data);
                }
            });

            if (window.customOnLoad && typeof (customOnLoad) == 'function') {
                customOnLoad();
            }

            $('.search').keypress(function (e) {
                if (e.which == 13) {
                    var myId = $(this).attr('id');
                    onSearch(myId)
                    return false;
                }
            });
        });

        function onSearch(controlId) {
            return search(controlId);
        }
    </script>

    <script type="text/ecmascript">
    function search(controlId) {
        var txtSearchCtrl = document.getElementById(controlId);
        if (txtSearchCtrl != null && txtSearchCtrl.value.length > 1) {
            searchText = txtSearchCtrl.value;
            location.href = '/News/Home/Search?searchText=' +  encodeURIComponent(searchText);
        }

        return false;
    }
    </script>
<?php wp_head(); ?>
</head>
<body>
 
    <div class="container body-content shadow" style="background-color:white;" id="maincontainer">
        <div class="d-none d-lg-block">
            <div id="header" class="row d-flex justify-content-between">
                <div id="app" class="col-auto"><a href='/News/default.htm'><div class="mt">VietCatholic News</div><div class="st">Tin Tức Công Giáo Hoàn Vũ và Việt Nam</div></a></div>
                <div class="align-content-end col-auto">
                    <form class="form-inline my-2 my-lg-0" style="padding-right:5px">
                        <div class="input-group">
                            <input type="text" class="form-control search" placeholder="Search Text" id="txtSearch2" aria-label="Search Text">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success btn-danger" style="color:white" type="button" onclick="return onSearch('txtSearch2');"
                                        id="btnSearch" aria-haspopup="true" aria-expanded="false">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php get_template_part('templates/content','menu');?>
        </div>
    