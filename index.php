<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>پروژه تشابه یاب متن</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/87d046c949.js" crossorigin="anonymous"></script>   

</head>

<body dir="rtl">
<i class="fa-regular fa-file"></i>
    <div class="container">
        <!-- header -->
        <div class="row mt-3 text-center">
            <h1>
                «پروژه تشابه یاب متن»
            </h1>
        </div>
        <!-- form -->
        <div class="row g-3 mt-3 card p-2">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="d-grid gap-2">
                    <label for="tFile1" class="form-label">
                        لطفا فایل اول را انتخاب کنید
                        
                             <i class="fa-regular fa-file"></i>
                             <input class="form-control" id="tFile1" name="tFile[]" type="file" required />
                </div>
                <div class="d-grid gap-2">
                    <label for="tFile1" class="form-label">
                        لطفا فایل دوم را انتخاب کنید
                        <i class="fa-regular fa-file"></i>
                        <input class="form-control" id="tFile1" name="tFile[]" type="file" required />
                        
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary"> ارسال و پردازش</button>
                </div>
            </form>
        </div>
        <!-- end of form -->
    </div>
    <div class="container card mt-3 p-3 bg-light">
        <h4>
            متن ها:
        </h2>
        <?php
            include("classes/TextSim.php");
            $mTextSim = new TextSim(); // constructor callback
            if(isset($_FILES['tFile'])){
                foreach ($_FILES['tFile']['tmp_name'] as $index => $filepath){
                    $news = $mTextSim->openFile($filepath);
                    $mTextSim->setNewsContent(++$index, $news);
                }
                $mTextSim->printNewsContent();
                $mTextSim->runSim();
            }else{
                echo "<div class = \"alert alert-danger\">لطفا هر دو فایل را انتخاب کنید</div>";
            }
            // destruct callback
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>