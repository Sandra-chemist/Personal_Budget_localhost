<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Budget - View Balance</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="balance.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1 class="logo">Personal Budget</h1>
        <h4> Your Finance Manager </h4>
    </header>
    <main>
        <article class="container-fluid">
            <h2 class="logo">View Balance</h2>
            <div class="row">
                <form>
                    <p>
                        <label class="category">Select period of time </label>
                        <select id="expense">
                            <option>current month</option>
                            <option>previous month</option>
                            <option>current year</option>
                            <option>select period</option>
                        </select>
                    </p>
                    <input type="submit" value="Back to main menu">
                </form>
            </div>
            <div class="row">
                <section class="col-xl-6 col-xxl-4 offset-xxl-2">
                    <header>
                        <h3>Incomes</h3>
                    </header>
                    <table>
                        <thead>
                            <tr class="column">
                                <th>category</th>
                                <th>amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>salary</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>bank interest</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>sale on Allegro</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>other</td>
                                <td></td>
                            </tr>
                            <tr class="total">
                                <th>total</th>
                                <th></th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="piechart1"></div>
                </section>
                <section class="col-xl-6 col-xxl-4">
                    <header>
                        <h3>Expenses</h3>
                    </header>
                    <table>
                        <thead>
                            <tr class="column">
                                <th>category</th>
                                <th>amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>food</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>flat</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>transport</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>telecomunication</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>healthcare</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>clothes</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>hygiene</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>kids</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>entertainment</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>trip</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>training</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>books</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>saving</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>debt repayment</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>donation</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>stock exchange</td>
                                <td></td>
                            </tr>
                            <tr class="total">
                                <th>total</th>
                                <th></th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="piechart2"></div>
                </section>
            </div>
        </article>

    </main>
    <footer>
        <i class="icon-copyright"></i>
        Sandra Skibiszewska
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>