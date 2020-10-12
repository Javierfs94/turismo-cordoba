 <!-- ======= About Us Section ======= -->
 <section id="about" class="about">
   <div class="container">
     <div class="section-title" data-aos="fade-up">
       <h2>About Us</h2>
       <p>Magnam dolores commodi suscipit eius consequatur</p>
     </div>

     <div class="row">
       <div class="col-lg-6" data-aos="fade-right">
         <div class="image">
           <img src="assets/img/about.jpg" class="img-fluid" alt="">
         </div>
       </div>
       <div class="col-lg-6" data-aos="fade-left">
         <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3 ">
           <h3>Voluptatem dignissimos provident quasi corporis</h3>
           <p class="font-italic">
             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
             magna aliqua.
           </p>
           <ul>
             <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
             <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
             <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
           </ul>
           <p>
             Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
             velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
             culpa qui officia deserunt mollit anim id est laborum
           </p>
         </div>
       </div>
     </div>

   </div>
 </section><!-- End About Us Section -->


 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact section-bg">
   <div class="container">

     <div class="section-title">
       <h2>Contact</h2>
       <p>Magnam dolores commodi suscipit eius consequatur ex aliquid fuga eum quidem</p>
     </div>

     <div class="row">

       <div class="col-lg-4">
         <div class="info d-flex flex-column justify-content-center" data-aos="fade-right">
           <div class="address">
             <i class="icofont-google-map"></i>
             <h4>Location:</h4>
             <p>A108 Adam Street,<br>New York, NY 535022</p>
           </div>

           <div class="email">
             <i class="icofont-envelope"></i>
             <h4>Email:</h4>
             <p>info@example.com</p>
           </div>

           <div class="phone">
             <i class="icofont-phone"></i>
             <h4>Call:</h4>
             <p>+1 5589 55488 55s</p>
           </div>

         </div>

       </div>

       <div class="col-lg-8 mt-5 mt-lg-0">

         <form action="forms/contact.php" method="post" role="form" class="php-email-form" data-aos="fade-left">
           <div class="form-row">
             <div class="col-md-6 form-group">
               <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
               <div class="validate"></div>
             </div>
             <div class="col-md-6 form-group">
               <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
               <div class="validate"></div>
             </div>
           </div>
           <div class="form-group">
             <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
             <div class="validate"></div>
           </div>
           <div class="form-group">
             <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
             <div class="validate"></div>
           </div>
           <div class="mb-3">
             <div class="loading">Loading</div>
             <div class="error-message"></div>
             <div class="sent-message">Your message has been sent. Thank you!</div>
           </div>
           <div class="text-center"><button type="submit">Send Message</button></div>
         </form>

       </div>

     </div>

   </div>
 </section><!-- End Contact Section -->