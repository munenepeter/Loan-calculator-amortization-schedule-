<?php
$principal = 20;
$months = 1 * 12;
$interest = (2 / 100);
$fixedPayment = $principal / $months;
$interestRateForMonth = $interest / 12; 
$result = $interest / 12 * pow(1 + $interest / 12, $months) / (pow(1 + $interest / 12, $months) - 1) * $principal;
printf("Monthly pay is %.2f", $result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1 class="display-4">Loan Calculator</h1>
            <p class="lead">This is a simple loan calcualtor that takes in the amount and the time and
                calcuates the amount payable</p>
            <hr class="my-4">
            <p>Lets Go!</p>
            <hr class="my-4">
        </div>

        <div class="row">
            <div class="mx-4 col-md-4">

                <div class="form-group mb-2">
                    <label for="principal">Principal</label>
                    <input name="principal" type="text" class=" form-control" id="principal" placeholder="Enter Principal">
                </div>
                <div class="form-group mb-2">
                    <label for="interest">Interest(percentage)</label>
                    <input name="interest" type="text" class=" form-control" id="interest" placeholder="Interest">
                </div>
                <div class="form-group mb-2">
                    <label for="interest">Loan tenure</label>
                    <div class="row">
                        <div class="col">
                            <input name="years" type="text" class="form-control" placeholder="Years">
                        </div>
                        <div class="col">
                            <input name="months" type="text" class="form-control" placeholder="Months">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Calculate</button>

            </div>
            <div class="col-md-6">
                <table class="table">
                    <caption>Amortization Schedule
                        $20.00 at 2% interest
                        with 12 monthly payments
                        Total Payments: $20.22 Total Interest: $0.22</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Payment Amount</th>
                            <th scope="col">Principal Amount</th>
                            <th scope="col">Interest Amount</th>
                            <th scope="col">Balance Owed</th>
                        </tr>
                    </thead>
                    <?php
                    //Calculate interest for every month. 
                    for ($i = 0; $i < $months; $i++) { 
                        //Diminish principal after calculating interest. 
                        $amountOwed = number_format($principal - $fixedPayment, 2);
                        //Payment for month is fixed pay + interest. 
                        $paymentAmount = number_format($principal - $amountOwed, 2); 
                        //calcute principalAmount  
                        $principalAmount = number_format($principal - $amountOwed, 2);
                        //Interest for the month. 
                        $interestForMonth = number_format($paymentAmount - $principalAmount, 2);
                        $month = $i + 1;
                    ?>

                        <tbody>
                            <tr>
                                <th scope="row"><?php printf($month) ?></th>
                                <td><?php printf($paymentAmount) ?></td>
                                <td><?php printf($principalAmount) ?></td>
                                <td><?php printf($interestForMonth) ?></td>
                                <td><?php printf($amountOwed) ?></td>
                            </tr>
                        <?php
                    }
                        ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>