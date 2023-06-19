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
    </style>
</head>
<body>
<div class="container">
    <form action="/edit" method="post" enctype="multipart/form-data">
        <h1>Update Here</h1>
        <?php foreach ($getDetails as $products => $Product): ?>
        <label>Product Name</label>
        <input type="text" class="productName" name="productName" value="<?php echo $Product->product_name ?>"/>
        <label>Product Image</label>
        <input type="file" class="productImage" name="productImage" />
        <label>Product Model No</label>
        <input type="text" class="productModel" name="productModel" value="<?php echo $Product->model_no ?>"/>
        <label>Product Price</label>
        <input type="number" class="productPrice" name="productPrice" value="<?php echo $Product->product_price ?>"/>
        <label>Brand</label>
        <select name="brandName">
            <option>VIVI</option>
            <option>OPPO</option>
            <option>Samsung</option>
            <option>One Plus</option>
            <option>Red MI</option>
        </select>
        <label>Manufacture Date</label>
        <input type="date" name="manufactureDate" value="<?php echo $Product->manufacture_date ?>"/>
        <label>Available Stocks</label>
        <input type="number" name="stocks" value="<?php echo $Product->available_stock ?>"/>
        <input type="number" hidden value="<?php echo $Product->id?>" name="editId"/>
        <button type="submit" value="edit" name="action">Update</button>
        <?php endforeach;?>
    </form>
</div>
</body>
</html>