<?php 
	print '
        <div class="contactHeader"> </div>
    <main>
        <h1>How can we help you?</h1>
        <div id="contact">
            <div id="contactForm">
                <form action="http://work2.eburza.hr/pwa/responzive-page/send-contact.php" id="contact_form"
                    name="contact_form" method="POST">
                    <label for="fname">First Name *</label>
                    <br>
                    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

                    <br>
                    <label for="lname">Last Name *</label>
                    <br>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

                    <br>
                    <label for="lname">Your E-mail *</label>
                    <br>
                    <input type="email" id="email" name="email" placeholder="Your e-mail.." required>

                    <br>
                    <label for="country">Country</label>
                    <br>
                    <select id="country" name="country">
                        <br>
                        <option value="" selected>Please select</option>
                        <option value="HR">Croatia</option>
                        <option value="BiH">Bosnia and Herzegovina</option>
                        <option value="SRB">Serbia</option>
                        <option value="SLO">Slovenia</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="PL">Poland</option>
                        <option value="IT">Italy</option>
                        <option value="DE">Germany</option>
                        <option value="Other">Other</option>
                    </select>

                    <br>
                    <label for="subject">Subject</label>
                    <br>
                    <textarea id="subject" name="subject" placeholder="Write something.."
                        style="height:200px"></textarea>

                    <input type="submit" value="Submit">
                </form>

            </div>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11667.255358376118!2d17.02034599290513!3d43.02430541802561!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134a5bc03d9b9467%3A0xa00ad52d0af05b0!2zTG92acWhdGU!5e0!3m2!1shr!2shr!4v1636405372651!5m2!1shr!2shr"
                width="100%" height="600" frameborder="0" style="border:0" allowfullscreen>
            </iframe>
        </div>
    <footer>
		<hr>
		Copyright &copy; 2021 Doris Pavić. <a href="https://github.com/DorisPavic?tab=repositories"><img
				src="slike/github.png" title="Github" alt="Github" style="width:30px;width:15px"></a></p>
		</br>
	</footer>';
?>