<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="saSha is a photography studio for the new generation, specializing in authentic, high-impact visual content designed for the digital world.">
    <title>saSha • photography studio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7a66bd7ea4.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <div class="nav-container">
            <div class="nav-logo">
                <a href="#"><img src="saSha-logo.svg" 
                    alt="logo rosso di saSha studio"
                    height="80">
                </a>
                <p>photography studio<br>
                    since 2010
                </p>
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="#about">About us</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contacts">Contacts</a></li>
                </ul>
            </div>
            <div class="nav-social">
                <i class="fa-brands fa-square-instagram fa-xl"></i> 
                <i class="fa-brands fa-square-linkedin fa-xl"></i>
            </div>
        </div>
    </nav>
    <div class="space"></div>
    <div class="container">
        <div class="first-column">
            <div class="image-container fill">
                <img src="https://images.pexels.com/photos/2896823/pexels-photo-2896823.jpeg"
                    class="grayscale fill"
                    loading="lazy"
                    alt="Foto Dell'uomo Tatuato In Posa Con Gli Occhi Chiusi @Arianna Jadé">
            </div>
        </div>
        <div class="second-column">
            <div class="text-container">
                <h1>Welcome to the new generation studio</h1>
                <p>Stop scrolling, you've found us. <br><br>
                We're <strong>saSha</strong>, and we're not your parents' photo studio. We're the place where digital natives come to capture their story, IRL and URL. <br><br>
                Forget the stiff poses and the cheugy backdrops. We're fluent in the language of the internet: from aesthetic portraits that slay on your feed, to bold brand imagery that tells your audience "we understood the assignment."<br><br>
                Ready to capture content that earns a double-tap? <strong>Let's make some magic.</strong></p>
            </div>
        </div>
    </div>
    <div id="features"></div>
    <div class="features-container">
        <div class="text-container">
            <h1>We get it.</h1>
        </div>
        <div class="card-container">
            <div class="center">
                <h2>High-Speed Edits</h2>
                <p>We know nobody has time for weeks of waiting. Your gallery drops fast.</p>
            </div>
        </div>
        <div class="card-container">
            <div class="center">
                <h2>Authentic Vibes</h2>
                <p>Your session is a safe space to be 100% that person. No cap.</p>
            </div>
        </div>
        <div class="card-container">
            <div class="center">
                <h2>Main Character Energy</h2>
                <p>We focus on making you the highlight, whether it's for a TikTok profile, a creative project, or just living your best life.</p>
            </div>
        </div>
    </div>
    <div id="about"></div>
    <div class="container">
        <div class="first-column">
            <div class="text-container">
                <h1>Not Your Average Studio</h1>
                <p>We’re more than just photography. We’re a Vibe Shift. <br><br>
                We know you’re tired of the corporate, low-effort content clogging up your feed. At saSha, we live at the intersection of <strong>culture, creativity, and code</strong>. Founded by creatives who grew up with a camera roll full of memories and a deep understanding of what makes content go viral, we built this studio to be different. <br><br>
                <strong>Our Philosophy? It's giving ICONIC.</strong><br><br>
                We believe that photography in the new generation isn't about documentation—it's about personal branding, aesthetic immersion, and instant connection. We don't just take pictures; we craft visual assets designed for the digital world.</p>
            </div>
        </div>
        <div class="second-column">
            <div class="image-container fill">
                <img src="https://images.pexels.com/photos/828380/pexels-photo-828380.jpeg"
                    class="grayscale fill"
                    loading="lazy"
                    alt="Persone Che Scattano Foto Di Macchine Fotografiche D'epoca @Jordan Benton">
            </div>
        </div>
    </div>
    <div id="portfolio"></div>
    <div class=text-container>
        <h1>Portfolio</h1>
        <p>Welcome to the saSha gallery—your ultimate source of visual inspiration. <br><br>
        This portfolio isn't just a collection of our best work; it's a testament to the <strong>aesthetic mastery and viral potential</strong> we bring to every single client. Here, you’ll see how we translate raw ideas and authentic vibes into polished, high-impact content designed to dominate the digital landscape. <br><br>
        <strong>We don’t chase trends. We set them.</strong> <br><br>
        Every image is a moment captured, edited, and optimized for maximum impact—a true representation of what happens when <strong>vision meets the new generation studio</strong>.</p>
    </div>
    <div class="portfolio-container fill">
        <?php
            // Get images from portfolio folder
            // This comment explains the intent of the code section below
            $dir = __DIR__ . DIRECTORY_SEPARATOR . "portfolio" . DIRECTORY_SEPARATOR;
            // __DIR__ = the absolute path to the current directory
            // DIRECTORY_SEPARATOR = a special constant that adds "/" (or "\" on Windows) 
            // We're building a full path like: /var/www/html/portfolio/
            // The dot (.) concatenates (joins) strings together
            $images = glob(
                "$dir*.{jpg,jpeg,png,webp}", GLOB_BRACE
                // glob() searches for files matching a pattern
                // "$dir*.{jpg,jpeg,png,webp}" means: find ALL files in portfolio/ 
                // that end with .jpg, .jpeg, .png, OR .webp
                // GLOB_BRACE tells glob() to interpret the {jpg,jpeg,...} as options
                // The result is an array of matching file paths stored in $images
            );
            // Output images
            // Loop through each image file we found
            foreach($images as $i) {
                // $i holds one image filename during each loop iteration
                printf("<img class='grayscale fill' src='portfolio/%s' loading='lazy'>",
                // printf() outputs formatted text
                // %s is a placeholder that gets replaced by the next argument
                // This creates: <img class='grayscale fill' src='portfolio/image.jpg'>
                rawurldecode(basename($i))
                // basename($i) extracts just the filename (removes the full path)
                // rawurldecode() converts URL-encoded characters back to normal
                // For example: "my%20photo.jpg" becomes "my photo.jpg"
            );
            }
        ?>
    </div>
    <div id="services"></div>
    <div class=text-container>
        <h1>Our services.</h1>
    </div>
    <div class="features-container">
        <div class="card-container">
            <div class="center">
                <h2>Personal Branding</h2>
                <p>Whether you're an influencer, a creative entrepreneur, or just need a new look for your professional profile, we focus on capturing your authentic vibe and making you look utterly iconic.</p>
            </div>
        </div>
        <div class="card-container">
            <div class="center">
                <h2>Business & Commercial Content</h2>
                <p>Your brand is everything. We create eye-catching visual content—from product photography to lifestyle campaigns—that is trend-aware and designed to convert.</p>
            </div>
        </div>
        <div class="card-container">
            <div class="center">
                <h2>Creative & Editorial Projects</h2>
                <p>Got a big, complex visual idea? We live for the conceptual. This service is for musicians, artists, designers, and anyone with a moodboard that hits different.</p>
            </div>
        </div>
    </div>
    <div id="contacts"></div>
    <div class="container">
        <div class="first-element">
            <h1>Let's Collab: <br>DM Us the Deets!</h1>
        </div>
        <div class="second-element">
            <div class="text-container">
                <p>Ready to stop scrolling and start slaying? <br><br>
                We're all about high-speed communication. Whether you have a fully-formed vision, a fire moodboard, or just a vague idea that needs a <strong>vibe check</strong>, hit us up! This is your direct line to the <strong>saSha creative team</strong>. <br><br>
                Fill out the form below and tell us everything. The more details you share, the faster we can tailor the perfect session for you.</p>
            </div>
            <form>
                <div>
                    <label for="full_name">Full name</label><br>
                    <input type="text" id="full_name" name="full_name" placeholder="Example: Alex Taylor">
                </div>
                <br>
                <div>
                    <label for="email">Email</label><br>
                    <input type="text" id="email" name="email" placeholder="Your most-used email">
                </div>
                <br>
                <div>
                    <label for="idea">Your Vibe / Idea</label><br>
                    <textarea id="idea" name="idea" placeholder="Describe your moodboard, goal, or the vibe you're going for. Example: 'I want dark aesthetic photos for my jewelry brand.'"></textarea>
                </div><br>
                <button type="submit" onClick="submit_form()">Submit</button>
            </form>
        </div>
    </div>
<script src="script.js"></script>   
</body>
</html>