<html>
<head>
    <title>List Page</title>
    <style>
        body {
            background: #d0d0d0;
        }
        img#image {
            height: 75px;
            width: 75px;
        }
        th, td, tr {
            border: solid #00d76a 3px;
            padding: 34px;
        }
        table{
            border-collapse: collapse;
        }
        button.create {
            padding: 20px 30px;
            background: green;
            color: whitesmoke;
            font-size: 18px;
            border: 0;
            border-radius: 12px;
            margin-top: 24px;
            margin-left: 590px;
            cursor: pointer;
        }
        button.btn  {
            height: 30px;
            width: 50px;
            font-weight: bold;
            background: green;
            color: aliceblue;
            text-transform: capitalize;
            border: 0;
            border-radius: 7px;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <div class="container">
        <form>
            <div class="parentDiv">
                    <div class="cards">
                        <table>
                            <tr>
                                <th>SN No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Model No</th>
                                <th>Price</th>
                                <th>Brand Name</th>
                                <th>Mfc Date</th>
                                <th>Stocks</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <?php foreach ($getProducts as $products => $Product): ?>
                            <tr>
                                <td><p><?php echo $Product->id?></p></td>
                                <td> <img src="<?php echo $Product->product_image ?>" id="image"/></td>
                                <td><p><?php echo $Product->product_name ?></p></td>
                                <td><p><?php echo $Product->model_no ?></p></td>
                                <td><p><?php echo $Product->product_price ?></p></td>
                                <td><p><?php echo $Product->brand_name ?></p></td>
                                <td><p><?php echo $Product->manufacture_date ?></p></td>
                                <td> <p class="trow"><?php echo $Product->available_stock ?></p></td>
                                <td>
                                    <form action="/userView" method="post">
                                        <input type="text" hidden value="<?php echo $Product->id?>" name="targetId" />
                                        <button type="submit" class="btn" value="userView" name="action">edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/delete" method="post">
                                        <input type="text" hidden value="<?php echo $Product->id?>" name="targetId" />
                                        <button type="submit" class="btn" name="action" value="delete" >Delete</button>
                                    </form>
                                </td>
                                <?php endforeach;?>
                            </tr>
                        </table>
                    </div>
            </div>
        </form>
        <form action="view/userInput.php" method="post">
            <button type="submit" class="create">Create Product</button>
        </form>
    </div>
<script>
    let allElements = document.querySelectorAll('.trow');
    allElements.forEach(ele=>{
        let price = Number(ele.innerText);
        if(price < 10){
            ele.parentElement.parentElement.style.backgroundColor = "red";
        }
    })
</script>
</body>
</html>