<?php 
    include ("config.php");
    include ("header.php");
?>
            <main>
                <div class="formContainer">
                    <form action="/action_page.php">
                        GET IN TOUCH
                        <br>
                        <br>
                        <input type="email"  name="one" value="Your full name" required>
                        <input type="text" name="two" value="Your email address">
                        <textarea type="text" name="three" rows="10" value="Why are you contacting us?"></textarea>
                        <br><br>
                        <input class="submit" type="submit" value="Submit">
                        </form>
                    </div>
            </main>
<?php 
        include ("footer.php");
    ?>