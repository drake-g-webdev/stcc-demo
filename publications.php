<?php
$pageTitle = 'Publications';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Scientific Publications</h1>
            <p>Peer-reviewed research and publications from STCC and our collaborators</p>
        </div>
    </section>

    <!-- Intro -->
    <section class="content-section">
        <div class="container">
            <div class="intro-text">
                <h2>Contributing to Sea Turtle Science</h2>
                <p>Rigorous scientific research is at the heart of our conservation mission. Below you'll find publications produced by our team and collaborators, covering topics from Fibropapillomatosis (FP) to sea turtle demographics, habitat use, and conservation strategies in the Caribbean.</p>
            </div>
        </div>
    </section>

    <!-- Publications List -->
    <section class="content-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2>Recent Publications</h2>
            </div>
            <div class="publications-list">

                <!-- Example publication (placeholder) -->
                <div class="publication-item">
                    <div class="publication-year">2026</div>
                    <div class="publication-details">
                        <h3 class="publication-title">Publication Title Goes Here</h3>
                        <p class="publication-authors">Author Name, Author Name, Author Name</p>
                        <p class="publication-journal"><em>Journal Name</em>, Vol. X, Issue Y, Pages Z–Z</p>
                        <p class="publication-abstract">A brief abstract or summary of the publication will appear here once we add the real documents. This is a placeholder entry showing how each publication will be presented on the page.</p>
                        <div class="publication-actions">
                            <a href="#" class="btn btn-outline btn-small"><i class="fas fa-file-pdf"></i> Download PDF</a>
                            <a href="#" class="btn btn-outline btn-small" target="_blank"><i class="fas fa-external-link-alt"></i> View on Journal</a>
                        </div>
                    </div>
                </div>

                <div class="publication-item">
                    <div class="publication-year">2025</div>
                    <div class="publication-details">
                        <h3 class="publication-title">Another Publication Title</h3>
                        <p class="publication-authors">Author Name, Author Name</p>
                        <p class="publication-journal"><em>Journal Name</em>, Vol. X, Pages Z–Z</p>
                        <p class="publication-abstract">Placeholder abstract for another publication entry. Real publication details, DOI links, and PDF downloads will be added here.</p>
                        <div class="publication-actions">
                            <a href="#" class="btn btn-outline btn-small"><i class="fas fa-file-pdf"></i> Download PDF</a>
                        </div>
                    </div>
                </div>

                <div class="publication-item">
                    <div class="publication-year">2024</div>
                    <div class="publication-details">
                        <h3 class="publication-title">An Earlier Publication Example</h3>
                        <p class="publication-authors">Author Name, et al.</p>
                        <p class="publication-journal"><em>Journal Name</em>, Vol. X, Pages Z–Z</p>
                        <p class="publication-abstract">Another placeholder entry. Publications will be sorted by year with the most recent first.</p>
                        <div class="publication-actions">
                            <a href="#" class="btn btn-outline btn-small"><i class="fas fa-file-pdf"></i> Download PDF</a>
                            <a href="#" class="btn btn-outline btn-small" target="_blank"><i class="fas fa-external-link-alt"></i> DOI</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Collaboration CTA -->
    <section class="content-section">
        <div class="container">
            <div class="content-grid">
                <div class="content-text">
                    <h2>Research Collaborations</h2>
                    <p>STCC actively collaborates with universities, research institutions, and conservation organizations around the world. If you are a researcher interested in partnering with us on sea turtle research in Curaçao, we'd love to hear from you.</p>
                    <p>Our ongoing research focuses on population demographics, FP disease dynamics, habitat use, and long-term health monitoring of Curaçao's sea turtle populations.</p>
                    <div class="cta-buttons" style="justify-content: flex-start;">
                        <a href="mailto:info@curacaoturtles.org" class="btn btn-primary">Get in Touch</a>
                        <a href="research.php" class="btn btn-outline">Our Research</a>
                    </div>
                </div>
                <div class="content-image">
                    <img src="images/icon-research.png" alt="Scientific Research">
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Support Sea Turtle Research</h2>
            <p>Your contribution helps fund the research and conservation work behind these publications.</p>
            <div class="cta-buttons">
                <a href="donate.php" class="btn btn-primary">Donate Now</a>
                <a href="volunteer.php" class="btn btn-outline-white">Volunteer</a>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
