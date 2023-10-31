<html>

<head>
    <title>Entity Choice</title>
</head>

<body>
    <form method="GET" action="list_page.php">
        <label for="entity">Select Entity:</label>
        <select id="entity" name="entity">
            <option value="user" <?php if (isset($_GET['entity']) && $_GET['entity'] === 'user')
                echo 'selected'; ?>>User
            </option>
            <option value="property" <?php if (isset($_GET['entity']) && $_GET['entity'] === 'property')
                echo 'selected'; ?>>Property</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</body>

<a href="list_page.php?entity=user&action=login">Login</a>
<a href="list_page.php?entity=user&action=register">Register</a>

</html>