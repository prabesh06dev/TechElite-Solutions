<?php
include 'includes/header.php';
include 'includes/navbar.php';
include "includes/config.php";

$team = mysqli_query(
    $conn,
    "SELECT * FROM employees"
);

$projects = mysqli_query(
    $conn,
    "SELECT * FROM projects ORDER BY id DESC"
);
?>

<main>

    <section class="hero">

    <div class="container hero-container">

        <!-- LEFT SIDE -->
        <div class="hero-content">

            <span class="hero-tag">
                IT Solutions and Innovation
            </span>

            <h1>
                Building Digital Solutions
                <span>For The Future</span>
            </h1>

            <p class="hero-text">
                TechElite Solutions creates powerful web applications,
                AI solutions and cloud-based systems that help businesses
                grow digitally.
            </p>

            <div class="hero-buttons">

                <a href="#contact" class="btn">
                    Start a Project
                </a>

                <a href="#projects" class="btn-outline">
                    View Portfolio
                </a>

            </div>

        </div>


        <!-- RIGHT SIDE -->
        <div class="hero-visual">

            <!-- MAIN HERO IMAGE -->
            <div class="hero-image">

                <img
                    src="assets/images/heroo.png"
                    alt="TechElite Solutions"
                >

            </div>


            <!-- FLOATING PROJECTS -->
            <div class="floating-stat projects-stat">

                <div class="stat-icon">
                    <i class="fa-solid fa-rocket"></i>
                </div>

                <div>
                    <strong>150+</strong>
                    <span>Projects</span>
                </div>

            </div>


            <!-- FLOATING SATISFACTION -->
            <div class="floating-stat satisfaction-stat">

                <div class="stat-icon">
                    <i class="fa-solid fa-star"></i>
                </div>

                <div>
                    <strong>98%</strong>
                    <span>Satisfaction</span>
                </div>

            </div>


            <!-- FLOATING SUPPORT -->
            <div class="floating-stat support-stat">

                <div class="stat-icon">
                    <i class="fa-solid fa-headset"></i>
                </div>

                <div>
                    <strong>24/7</strong>
                    <span>Support</span>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     OUR AREAS OF EXPERTISE
========================================== -->

<!-- ==========================================
     TECH ELITE AT A GLANCE
========================================== -->

<section class="tech-glance" id="glance">

    <div class="container">

        <div class="section-heading">

            <span class="section-tag">
                TechElite Solutions
            </span>

            <h2>
                TechElite <span>at a Glance</span>
            </h2>

            <p>
                A quick look at who we are, how we work,
                and what drives our digital solutions.
            </p>

        </div>


        <div class="glance-grid">

            <!-- CARD 01 -->

            <div class="glance-card">

                <div class="glance-top">

                    <span class="glance-number">
                        01
                    </span>

                    <div class="glance-icon">
                        <i class="fa-solid fa-laptop-code"></i>
                    </div>

                </div>

                <h3>
                    Digital Solutions
                </h3>

                <p>
                    Building modern digital solutions
                    for evolving business needs.
                </p>

                <div class="glance-tags">

                    <span>Web</span>
                    <span>AI</span>
                    <span>Cloud</span>

                </div>

            </div>


            <!-- CARD 02 -->

            <div class="glance-card">

                <div class="glance-top">

                    <span class="glance-number">
                        02
                    </span>

                    <div class="glance-icon">
                        <i class="fa-solid fa-route"></i>
                    </div>

                </div>

                <h3>
                    Our Approach
                </h3>

                <p>
                    We follow an organized process from
                    planning to delivery and support.
                </p>

                <div class="glance-tags">

                    <span>Plan</span>
                    <span>Build</span>
                    <span>Deliver</span>

                </div>

            </div>


            <!-- CARD 03 -->

            <div class="glance-card">

                <div class="glance-top">

                    <span class="glance-number">
                        03
                    </span>

                    <div class="glance-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>

                </div>

                <h3>
                    Our Team
                </h3>

                <p>
                    A multidisciplinary team combining
                    technical and business-focused skills.
                </p>

                <div class="glance-tags">

                    <span>6 Members</span>
                    <span>Specialists</span>

                </div>

            </div>


            <!-- CARD 04 -->

            <div class="glance-card">

                <div class="glance-top">

                    <span class="glance-number">
                        04
                    </span>

                    <div class="glance-icon">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>

                </div>

                <h3>
                    Our Vision
                </h3>

                <p>
                    Creating reliable, innovative and
                    user-focused digital experiences.
                </p>

                <div class="glance-tags">

                    <span>Innovation</span>
                    <span>Growth</span>
                    <span>Reliability</span>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="about" id="about">

    <div class="container about-container">


        <!-- Image Side -->

        <div class="about-image">

            <div class="about-card">

                <div class="about-icon">
                    <i class="fa-solid fa-code"></i>
                </div>

                <h3>
                    Digital Innovation
                </h3>

                <p>
                    Creating powerful technology solutions
                    for modern businesses.
                </p>

            </div>

        </div>



        <!-- Content Side -->

        <div class="about-content">


            <span class="section-tag">
                About TechElite
            </span>


            <h2>
                We Build Digital Solutions
                That Drive Growth
            </h2>


            <p>
                TechElite Solutions is a technology company
                focused on building modern websites,
                AI applications, cloud systems and
                scalable software solutions.
            </p>


            <div class="about-features">


               <div class="feature">

                    <i class="fa-solid fa-code"></i>

                    <span>
                        Web Development
                    </span>

                </div>


                <div class="feature">

                    <i class="fa-solid fa-brain"></i>

                    <span>
                        AI Solutions
                    </span>

                </div>


                <div class="feature">

                    <i class="fa-solid fa-cloud"></i>

                    <span>
                        Cloud Services
                    </span>

                </div>


            </div>


            <a href="#contact" class="btn">
                Learn More
            </a>


        </div>


    </div>

</section>

<section class="services" id="services">

    <div class="container">


        <div class="section-heading">

            <span class="section-tag">
                Our Services
            </span>

            <h2>
                Technology Solutions
                For Your Business
            </h2>

            <p>
                We design and develop scalable digital
                solutions that help businesses grow.
            </p>

        </div>



        <div class="services-grid">


            <div class="service-card">

                <div class="service-icon">
                    <i class="fa-solid fa-code"></i>
                </div>

                <h3>
                    Web Development
                </h3>

                <p>
                    Build scalable websites and web
                    applications using modern technologies.
                </p>

                <a href="#contact" class="service-link">

                    Learn More →

                </a>

                


            </div>



            <div class="service-card">

                <div class="service-icon">
                    <i class="fa-solid fa-brain"></i>
                </div>

                <h3>
                    AI Solutions
                </h3>

                <p>
                    Develop smart AI-powered solutions
                    that automate and improve business processes.
                </p>

                <a href="#contact" class="service-link">

                    Learn More →

                </a>

            </div>



            <div class="service-card">

                <div class="service-icon">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                </div>

                <h3>
                    Mobile Applications
                </h3>

                <p>
                    Create fast and intuitive mobile
                    applications for Android and iOS platforms.
                </p>

                <a href="#contact" class="service-link">

                    Learn More →

                </a>

            </div>



            <div class="service-card">

                <div class="service-icon">
                    <i class="fa-solid fa-cloud"></i>
                </div>

                <h3>
                    Cloud Solutions
                </h3>

                <p>
                    Deploy secure and scalable cloud
                    solutions for modern businesses.
                </p>

                <a href="#contact" class="service-link">

                    Learn More →

                </a>

            </div>



            <div class="service-card">

                <div class="service-icon">
                    <i class="fa-solid fa-palette"></i>
                </div>

                <h3>
                    UI/UX Design
                </h3>

                <p>
                    Design attractive interfaces focused
                    on usability and user experience.
                </p>

                <a href="#contact" class="service-link">

                    Learn More →

                </a>

            </div>



            <div class="service-card">

                <div class="service-icon">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>

                <h3>
                    Cyber Security
                </h3>

                <p>
                    Secure digital systems and protect
                    valuable business information.
                </p>

                <a href="#contact" class="service-link">

                    Learn More →

                </a>

            </div>


        </div>


    </div>

</section>

<section class="why-us">

    <div class="container why-container">


        <!-- Content -->

        <div class="why-content">


            <span class="section-tag">
                Why Choose Us
            </span>


            <h2>
                Building Technology
                That Creates Impact
            </h2>


            <p>
                TechElite Solutions combines modern
                technology, creative thinking and
                industry best practices to deliver
                reliable digital solutions.
            </p>



            <div class="why-list">


                <div class="why-item">

                    <span>
                        <i class="fa-solid fa-check"></i>
                    </span>

                    <p>
                        Experienced Development Team
                    </p>

                </div>



                <div class="why-item">

                    <span>
                        <i class="fa-solid fa-check"></i>
                    </span>

                    <p>
                        Modern Technology Stack
                    </p>

                </div>



                <div class="why-item">

                    <span>
                        <i class="fa-solid fa-check"></i>

                    </span>

                    <p>
                        Secure & Scalable Solutions
                    </p>

                </div>



                <div class="why-item">

                    <span>
                        <i class="fa-solid fa-check"></i>
                    </span>

                    <p>
                        Agile Development Process
                    </p>

                </div>


            </div>


        </div>



        <!-- Card -->

        <div class="why-card">


            <h3>
                Tech Excellence
            </h3>


            <div class="experience-number">
                <span>
                    100%
                </span>

                <small>
                    Quality Commitment
                </small>
            </div>


            <p>
                Commitment to quality,
                innovation and customer success.
            </p>


        </div>



    </div>

</section>


<section class="tech-stack">

    <div class="container">


        <div class="section-heading">

            <span class="section-tag">
                Technology Stack
            </span>


            <h2>
                Technologies We Use
            </h2>


            <p>
                We use modern tools and frameworks
                to create scalable digital products.
            </p>

        </div>



        <div class="tech-grid">


            <div class="tech-card">
                <i class="fa-brands fa-html5"></i>

                <span>HTML5</span>
                
            </div>


            <div class="tech-card">
                <i class="fa-brands fa-css3-alt"></i>

                <span>CSS3</span>
            </div>


            <div class="tech-card">
                <i class="fa-brands fa-js"></i>

                <span>JavaScript</span>
                
            </div>


            <div class="tech-card">

                <i class="fa-brands fa-react"></i>

                    <span>
                        React
                    </span>

            </div>


            <div class="tech-card">
                <i class="fa-brands fa-node-js"></i>

                <span>Node.js</span>
                
            </div>


            <div class="tech-card">
                <i class="fa-brands fa-php"></i>
                <span>PHP</span>
            </div>


            <div class="tech-card">
                <i class="fa-brands fa-database"></i>

                <span>MongoDB</span>
                
            </div>


            <div class="tech-card">
                <i class="fa-brands fa-cloud"></i>

                <span>AWS Cloud</span>
                
            </div>


        </div>


    </div>

</section>


<section class="projects" id="projects">

    <div class="container">


        <div class="section-heading">

            <span class="section-tag">
                Our Projects
            </span>

            <h2>
                Solutions We Have Built
            </h2>

            <p>
                Explore some of our featured digital
                products and software solutions.
            </p>

        </div>



        <div class="projects-grid">

            <?php while($project = mysqli_fetch_assoc($projects)){ ?>

<div class="project-card">

    <div class="project-image">

        <img src="admin/assets/images/projects/<?php echo $project['image']; ?>"
             alt="<?php echo $project['title']; ?>">

    </div>

    <div class="project-content">

        <h3>
            <?php echo $project['title']; ?>
        </h3>

        <p>
            <?php echo $project['description']; ?>
        </p>

        <a href="<?php echo $project['github_link']; ?>"
            target="_blank"
            rel="noopener noreferrer">
                View Project →
        </a>
        

    </div>

</div>

<?php } ?>
            

            


        </div>


    </div>

</section>

<section class="team" id="team">

    <div class="container">


        <div class="section-heading">

            <span class="section-tag">
                Our Team
            </span>


            <h2>
                Meet The People Behind TechElite
            </h2>


            <p>
                A passionate team of developers,
                designers and technology enthusiasts.
            </p>

        </div>



        <div class="team-grid">

            <?php while($member = mysqli_fetch_assoc($team)){ ?>




<?php } ?>


            <div class="team-card">

                <div class="team-avatar">
                    <img src="assets/images/team/Mine.jpg"
                        alt="Prabesh Yadav">
                    
                </div>

                <h3>
                    Prabesh Yadav
                </h3>

                <p>
                    CEO and Founder

                </p>

                <div class="team-social">

                    <a href="https://www.linkedin.com/in/prabesh-yadav-124925373" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                        
                    </a>

                    <a href="https://www.github.com/PrabeshzzNxtzz" target="_blank">
                        <i class="fa-brands fa-github"></i>
                        
                    </a>

                </div>

            </div>



            <div class="team-card">

                <div class="team-avatar">
                    <img src="assets/images/team/Bishal.jpg"
                        alt="Bishal Sah">
                </div>

                <h3>
                    Bishal Sah
                </h3>

                <p>
                    Data Scientist, ML and SQL
                </p>

                <div class="team-social">

                    <a href="https://www.linkedin.com/in/bishal-shah-76640a3a8" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                        
                    </a>

                    <a href="https://www.github.com/bishalshah2061-create" target="_blank">
                        <i class="fa-brands fa-github"></i>
                        
                    </a>

                </div>

            </div>



            <div class="team-card">

                <div class="team-avatar">
                    <img src="assets/images/team/Rajinsh.jpg"
                        alt="Rajnish Yadav">
                </div>

                <h3>
                    Rajnish Yadav
                </h3>

                <p>
                    Manager and Full Stack Developer
                </p>

                <div class="team-social">

                    <a href="https://www.linkedin.com/in/rajnish-kumar-yadav-11a18433b" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                        
                    </a>

                    <a href="https://www.github.com/RajnishYadav900" target="_blank">
                        <i class="fa-brands fa-github"></i>
                        
                    </a>

                </div>

            </div>

            <div class="team-card">

                <div class="team-avatar">
                    <img src="assets/images/team/Ratan.jpg"
                        alt="Ratan Prakash Sah">
                </div>

                <h3>
                    Ratan Prakash Sah
                </h3>

                <p>
                    CyberSecurity
                </p>

                <div class="team-social">

                    <a href="https://www.linkedin.com/in/ratan-sah-207798393" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                        
                    </a>

                    <a href="https://www.github.com/sahratan654-ui" target="_blank">
                        <i class="fa-brands fa-github"></i>
                        
                    </a>

                </div>

            </div>

            <div class="team-card">

                <div class="team-avatar">
                    <img src="assets/images/team/BK.jpg"
                        alt="Bk Sah">
                </div>

                <h3>
                    Bk Sah
                </h3>

                <p>
                    Customer Success Manager
                </p>

                <div class="team-social">

                    <a href="https://www.linkedin.com/in/bk-sah-26869a428" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                        
                    </a>

                    <a href="https://github.com/in/your-profile" target="_blank">
                        <i class="fa-brands fa-github"></i>
                        
                    </a>

                </div>

            </div>


            <div class="team-card">

                <div class="team-avatar">
                    <img src="assets/images/team/Sushant.jpg"
                        alt="Sushant Yadav">
                </div>

                <h3>
                    Sushant Yadav
                </h3>

                <p>
                    Network Engineer
                </p>

                <div class="team-social">

                  <a href="https://www.linkedin.com/in/sushant-yadav-2a2a9b427" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                        
                    </a>

                    <a href="https://www.github.com/sushantydv-22" target="_blank">
                        <i class="fa-brands fa-github"></i>
                        
                    </a>

                </div>

            </div>


        </div>


    </div>

</section>


<!-- ==========================================
     HOW WE WORK
========================================== -->

<section class="how-we-work" id="process">

    <div class="container">

        <div class="section-heading">

            <span class="section-tag">
                Our Process
            </span>

            <h2>
                How We <span>Work</span>
            </h2>

            <p>
                From understanding your requirements to delivering
                the final solution, we follow a simple and organized process.
            </p>

        </div>


        <div class="process-container">

            <!-- STEP 01 -->
            <div class="process-card">

                <div class="process-number">
                    01
                </div>

                <div class="process-icon">
                    <i class="fa-solid fa-comments"></i>
                </div>

                <h3>
                    Understand
                </h3>

                <p>
                    We understand the client's requirements,
                    goals and project needs.
                </p>

            </div>


            <div class="process-line"></div>


            <!-- STEP 02 -->
            <div class="process-card">

                <div class="process-number">
                    02
                </div>

                <div class="process-icon">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>

                <h3>
                    Plan
                </h3>

                <p>
                    We define the project scope, solution approach
                    and development plan.
                </p>

            </div>


            <div class="process-line"></div>


            <!-- STEP 03 -->
            <div class="process-card">

                <div class="process-number">
                    03
                </div>

                <div class="process-icon">
                    <i class="fa-solid fa-code"></i>
                </div>

                <h3>
                    Build
                </h3>

                <p>
                    Our team designs and develops the required
                    digital solution.
                </p>

            </div>


            <div class="process-line"></div>


            <!-- STEP 04 -->
            <div class="process-card">

                <div class="process-number">
                    04
                </div>

                <div class="process-icon">
                    <i class="fa-solid fa-rocket"></i>
                </div>

                <h3>
                    Deliver & Support
                </h3>

                <p>
                    We deliver the solution, collect feedback
                    and provide continued support.
                </p>

            </div>

        </div>

    </div>

</section>


<section class="contact" id="contact">

    <div class="container contact-container">


        <!-- Contact Info -->

        <div class="contact-info">


            <span class="section-tag">
                Contact Us
            </span>


            <h2>
                Let's Build Something Great Together
            </h2>


            <p>
                Have an idea or project?
                Our team is ready to help
                you transform it into reality.
            </p>



            <div class="contact-item">
                <i class="fa-solid fa-location-dot"></i>
                <div>
                    <strong>
                         Location
                    </strong>

                    <p>
                         Kathmandu, Nepal
                    </p>
                </div>
            </div>



            <div class="contact-item">
                <i class="fa-solid fa-envelope"></i>

                <div>

                    <strong>
                         Email
                    </strong>

                    <p>
                        contact.techelitesolutions@gmail.com
                    </p>

                </div>

            </div>

            <div class="contact-item">
                <i class="fa-solid fa-phone"></i>

                <div>

                    <strong>
                         Phone
                    </strong>

                    <p>
                        +977 9767930481
                    </p>
                
                </div>

            </div>


        </div>



        <!-- Contact Form -->


        <div class="contact-form">


            <form action="send_message.php" method="POST">


                <input 
                type="text" 
                name="name"
                placeholder="Your Name"
                required>


                <input 
                type="email" 
                name="email"
                placeholder="Your Email"
                required>

                <input
                type="text"
                name="subject"
                placeholder="Subject"
                required>


                <textarea 
                name="message"
                placeholder="Your Message"
                required></textarea>


                <button type="submit" class="btn contact-btn">

                    <i class="fa-solid fa-paper-plane"></i>

                    Send Message

                </button>


            </form>


        </div>


    </div>


</section>

</main>

<script>
    const navToggle = document.getElementById("navToggle");
    const navMenu = document.getElementById("navMenu");

    navToggle.addEventListener("click", () => {
    navMenu.classList.toggle("active");
    });
</script>

<?php
include 'includes/footer.php';
?>

