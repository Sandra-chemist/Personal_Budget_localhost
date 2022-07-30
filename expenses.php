<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Budget - Add Expense</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="expenses.css" type="text/css">
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
            <header>
                <h2 class="logo">Add Expense</h2>
            </header>
            <div class="row">
                <form>
                    <p>
                        <label class="amount">Amount <input type="number" placeholder="123" step="0.01" min="0"></label>
                    </p>
                    <p>
                        <label class="date" for="start">Date </label>
                        <input type="date" id="start" name="trip-start">
                    </p>
                    <p>
                        <label class="payment">Payment Method </label>

                        <input type="radio" id="cash" name="payments" value="cash" checked><label for="cash">
                            cash</label>

                        <input type="radio" id="debid_card" name="payments" value="debid_card"><label for="debid_card">
                            debid card</label>

                        <input type="radio" id="credit_card" name="payments" value="credit_card"><label
                            for="credit_card"> credit card</label>
                    </p>
                    <p>
                        <label class="category">Category </label>
                        <select id="expense">
                            <option>food</option>
                            <option>flat</option>
                            <option>transport</option>
                            <option>telecommunication</option>
                            <option>healthcare</option>
                            <option>clothes</option>
                            <option>hygiene</option>
                            <option>kids</option>
                            <option>entertainment</option>
                            <option>trip</option>
                            <option>training</option>
                            <option>books</option>
                            <option>savings</option>
                            <option>debt repayment </option>
                            <option>donation</option>
                            <option>stock exchange</option>
                        </select>
                    </p>
                    <p>
                        <label class="comment">Comment <input type="text" placeholder="(optional)"></label>
                    </p>
                    <input id="add" type="submit" value="Add">
                    <input type="submit" value="Cancel">
                </form>
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
    <script src="personalBudget.js"></script>
</body>

</html>