<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #paymentResult {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Secure Payment</h2>
        <form id="paymentForm">
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" placeholder="Enter your card number" required>

            <label for="expiryDate">Expiry Date:</label>
            <input type="text" id="expiryDate" placeholder="MM/YYYY" required>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" placeholder="Enter CVV" required>

            <button type="button" onclick="processPayment()">Make Payment</button>
        </form>
        <div id="paymentResult"></div>
    </div>
    <script>
        function processPayment() {
            // In a real-world scenario, this function would interact with a payment gateway.
            // For simplicity, let's assume the payment is successful.

            const cardNumber = document.getElementById('cardNumber').value;
            const expiryDate = document.getElementById('expiryDate').value;
            const cvv = document.getElementById('cvv').value;

            // Perform basic validation (you should perform more comprehensive validation in a real-world scenario)
            if (!cardNumber || !expiryDate || !cvv) {
                document.getElementById('paymentResult').innerHTML = 'Please fill in all the fields.';
                return;
            }

            // Simulate a successful payment
            document.getElementById('paymentResult').innerHTML = 'Payment successful! Thank you for booking with us.';
        }

    </script>
</body>

</html>