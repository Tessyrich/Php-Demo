<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >
        <title>Vehicle Form</title>
        <style>
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
        }

        .container form div {
            margin-bottom: 15px;
        }

        .container form label {
            display: block;
            margin-bottom: 5px;
        }

        .container form input,
        .container form button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        .vehicle-details {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
        </style>
    </head>

    <body>


        <div class="container">
            <h2>Add Vehicle</h2>
            <form method="post">
                <div>
                    <label for="name">Name:</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        required
                    >
                </div>
                <div>
                    <label for="model">Model:</label>
                    <input
                        type="text"
                        id="model"
                        name="model"
                        required
                    >
                </div>
                <div>
                    <label for="year">Year:</label>
                    <input
                        type="number"
                        id="year"
                        name="year"
                        required
                    >
                </div>
                <div>
                    <label for="color">Color:</label>
                    <input
                        type="text"
                        id="color"
                        name="color"
                        required
                    >
                </div>
                <div>
                    <label for="price">Price:</label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        required
                    >
                </div>
                <button
                    type="submit"
                    id="submitButton"
                >Add Vehicle</button>
            </form>



            <script>
         
                //run fetch rquest 
                document.getElementById("submitButton").addEventListener('click', function() {
                    
                    const name = document.getElementById('name').value;
                const model = document.getElementById('model').value;
                const price = document.getElementById('price').value;
                const year = document.getElementById('year').value;
                const color = document.getElementById('color').value;
                let  responData 
                event.preventDefault();
                fetch('../Backend/Sever.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        name: name,
                        model: model,
                        year: year,
                        color: color,
                        price: price
                    })
                })
                .then(response => response.json()) // or response.json() if your server returns JSON
                .then(data => {
              responseData= data;
                  if(responseData.status === 'error'){
                      alert(responseData.message);
                  }else{
                    const successData = responseData.data;
                    document.getElementById('vehicleName').innerText = successData.name;
                    document.getElementById('vehicleModel').innerText = successData.model;
                    document.getElementById('vehicleYear').innerText = successData.year;
                    document.getElementById('vehicleColor').innerText = successData.color;
                    document.getElementById('vehiclePrice').innerText = successData.price;
                    

                  }
                    console.log(data); // Here you can handle your data
                })
                .catch((error) => {
                    console.error('Error:', error); // Here you can handle errors
                });
               

            })
            </script>
        </div>

        <!-- dummy div to dusplay data  -->
        <div>
            <div class="vehicle-details">
                <h2>Vehicle Details</h2>
                <p><strong>Name:</strong> <span id="vehicleName"></span></p>
                <p><strong>Model:</strong> <span id="vehicleModel"></span></p>
                <p><strong>Year:</strong> <span id="vehicleYear"></span></p>
                <p><strong>Color:</strong> <span id="vehicleColor"></span></p>
                <p><strong>Price:</strong> <span id="vehiclePrice"></span></p>
            </div>
        </div>
    </body>

</html>
