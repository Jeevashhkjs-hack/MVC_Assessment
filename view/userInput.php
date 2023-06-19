<html>
<head>
    <title>Register Products</title>
    <style>
        label{
            display: block;
        }
        body {
            background: #d0d0d0;
        }
        form {
            background-color: darkgray;
            width: fit-content;
            padding: 20px 90px;
            margin-left: 32%;
        }
        h1 {
            text-align: center;
            color: green;
        }
        label {
             display: block;
             color: darkgreen;
             font-size: 20px;
             font-weight: bold;
         }
        button {
            display: block;
            margin-top: 25px;
            padding: 13px 26px;
            border: 0;
            border-radius: 11px;
            margin-left: 50px;
            background: green;
            color: aliceblue;
            cursor: pointer;
        }
        input {
            margin-bottom: 14px;
            height: 25px;
            width: 300px;
            border: 0;
            border-radius: 5px;
        }
        .error{
            color: red;
            font-size: 21px;
        }

    </style>
</head>
<body>
    <div class="container">
        <form action="/create" method="post" enctype="multipart/form-data">
            <h1>Register Here!</h1>
            <label>Product Name</label>
            <input type="text" class="productName" name="productName" />
            <label>Product Image</label>
            <input type="file" class="productImage" name="productImage"/>
            <label>Product Model No</label>
            <input type="text" class="productModel" name="productModel" />
            <label>Product Price</label>
            <input type="number" class="productPrice" name="productPrice" min="1"/>
            <label>Brand</label>
            <select name="brandName">
                <option>VIVI</option>
                <option>OPPO</option>
                <option>Samsung</option>
                <option>One Plus</option>
                <option>Red MI</option>
            </select>
            <label>Manufacture Date</label>
            <input type="date" name="manufactureDate" value="<?php date("Y-m-d") ?>"/>
            <label>Available Stocks</label>
            <input type="number" name="stocks" min="0"/>
            <button type="submit" value="create" name="action">Register Here</button>
            <?php if($_SESSION['error']): ?>
               <p class="error"><?php print_r($_SESSION['error']) ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>