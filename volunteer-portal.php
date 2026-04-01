<?php
session_start();

// Auth gate: redirect to login if not authenticated
if (!isset($_SESSION['volunteer_authenticated']) || $_SESSION['volunteer_authenticated'] !== true) {
    header('Location: volunteer-login.php');
    exit;
}

$pageTitle = 'Volunteer Portal';
include 'includes/head.php';
include 'includes/header.php';
?>

    <!-- Portal Header -->
    <section class="portal-header">
        <div class="container">
            <div class="portal-welcome">
                <div class="welcome-text">
                    <h1>Welcome to the Volunteer Portal</h1>
                    <p>Hello, Volunteer! Access your resources and documentation below.</p>
                </div>
                <a href="volunteer-login.php?action=logout" class="btn btn-outline-white"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="portal-quicklinks">
        <div class="container">
            <div class="quicklinks-grid">
                <a href="#guidelines" class="quicklink-card">
                    <i class="fas fa-book"></i>
                    <span>Conduct Guidelines</span>
                </a>
                <a href="#nest-registration" class="quicklink-card">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Nest Registration</span>
                </a>
                <a href="#hatching-form" class="quicklink-card">
                    <i class="fas fa-egg"></i>
                    <span>Hatching Form</span>
                </a>
                <a href="#emergency" class="quicklink-card emergency">
                    <i class="fas fa-phone-alt"></i>
                    <span>Emergency Contacts</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Emergency Contacts -->
    <section id="emergency" class="portal-section">
        <div class="container">
            <div class="emergency-contacts-box">
                <h2><i class="fas fa-phone-alt"></i> Emergency & Important Contacts</h2>
                <div class="contacts-grid">
                    <div class="contact-group">
                        <h3>STCC Staff</h3>
                        <ul>
                            <li><strong>Field Coordinator:</strong> <span class="demo-number">XXX-XXXX</span></li>
                            <li><strong>Field Assistant:</strong> <span class="demo-number">XXX-XXXX</span></li>
                            <li><strong>Banda Abou Contact:</strong> <span class="demo-number">XXX-XXXX</span></li>
                            <li><strong>Board Contact:</strong> <span class="demo-number">XXX-XXXX</span></li>
                        </ul>
                        <p class="demo-note"><em>* Real contact numbers provided to registered volunteers</em></p>
                    </div>
                    <div class="contact-group">
                        <h3>Emergency Services</h3>
                        <ul>
                            <li><strong>Police & Fire:</strong> <a href="tel:911">911</a></li>
                            <li><strong>Ambulance:</strong> <a href="tel:912">912</a></li>
                            <li><strong>Coast Guard:</strong> <a href="tel:913">913</a></li>
                            <li><strong>Hyperbaric Chamber:</strong> <a href="tel:910">910</a></li>
                        </ul>
                    </div>
                    <div class="contact-group">
                        <h3>Other Numbers</h3>
                        <ul>
                            <li><strong>Disaster Management:</strong> <span class="demo-number">XXX-XXXX</span></li>
                            <li><strong>Wildlife Rescue:</strong> <span class="demo-number">XXX-XXXX</span></li>
                        </ul>
                        <p class="demo-note"><em>* Real contact numbers provided to registered volunteers</em></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Guidelines Section -->
    <section id="guidelines" class="portal-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2><i class="fas fa-book"></i> Guidelines of Volunteer Conduct</h2>
                <p>Essential guidelines for all STCC volunteers</p>
            </div>
            <div class="guidelines-grid">
                <div class="guideline-card">
                    <div class="guideline-number">1</div>
                    <h3>Commitment to the Cause</h3>
                    <p>Dedicate your time and effort to the mission of protecting and conserving sea turtles and their habitats.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">2</div>
                    <h3>Adherence to Guidelines</h3>
                    <p>Follow all organization protocols, guidelines, and safety measures to ensure the well-being of sea turtles and fellow volunteers.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">3</div>
                    <h3>Respect for Nature</h3>
                    <p>Approach sea turtles and their habitats with respect and care, maintaining a non-intrusive presence.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">4</div>
                    <h3>Education and Training</h3>
                    <p>Continuously educate yourself about sea turtle habitat and conservation methods, and actively participate in training programs provided by the organization.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">5</div>
                    <h3>Environmental Responsibility</h3>
                    <p>Act responsibly and sustainably, minimizing your environmental impact during fieldwork and at the organization's facilities.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">6</div>
                    <h3>Teamwork</h3>
                    <p>Collaborate with fellow volunteers and staff members, valuing their contributions and expertise in achieving common goals.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">7</div>
                    <h3>Data Collection and Reporting</h3>
                    <p>Accurately record and report data on sea turtle activities, nesting, and health as required by the organization.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">8</div>
                    <h3>Community Engagement</h3>
                    <p>Engage with local communities and raise awareness about the importance of sea turtle conservation, fostering support for the cause.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">9</div>
                    <h3>Safety Awareness</h3>
                    <p>Prioritize your safety and the safety of your fellow volunteers and the sea turtles. Follow safety guidelines during fieldwork and report any unsafe conditions.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">10</div>
                    <h3>Professionalism</h3>
                    <p>Maintain professionalism in all interactions, representing the organization positively in your interactions with the public and local authorities.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">11</div>
                    <h3>Flexibility and Adaptability</h3>
                    <p>Be flexible and adaptable to changing conditions in the field, including unpredictable weather or sea turtle behavior.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">12</div>
                    <h3>Equipment Care</h3>
                    <p>Handle organization equipment and resources with care, ensuring they are properly maintained and returned after use.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">13</div>
                    <h3>Communication</h3>
                    <p>Keep open lines of communication with the organization's leadership and fellow volunteers, sharing ideas, concerns, and successes.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">14</div>
                    <h3>Fundraising and Support</h3>
                    <p>Contribute to the organization's fundraising efforts and actively seek support to ensure the sustainability of the non-profit.</p>
                </div>
                <div class="guideline-card">
                    <div class="guideline-number">15</div>
                    <h3>Passion and Dedication</h3>
                    <p>Demonstrate a genuine passion and dedication to sea turtle conservation, as your enthusiasm can inspire others and make a significant impact.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Field Checklists -->
    <section class="portal-section">
        <div class="container">
            <div class="section-header">
                <h2><i class="fas fa-check-square"></i> Field Checklists</h2>
                <p>Essential items for fieldwork</p>
            </div>
            <div class="checklists-grid">
                <div class="checklist-box">
                    <h3><i class="fas fa-toolbox"></i> Kit Checklist</h3>
                    <ul class="checklist">
                        <li><i class="far fa-square"></i> Sample tubes (DNA & Isotope)</li>
                        <li><i class="far fa-square"></i> Measuring tape (long!)</li>
                        <li><i class="far fa-square"></i> Gloves</li>
                        <li><i class="far fa-square"></i> Garbage bags</li>
                        <li><i class="far fa-square"></i> Nylon flagging tape</li>
                        <li><i class="far fa-square"></i> Permanent marker</li>
                        <li><i class="far fa-square"></i> Nesting signs</li>
                        <li><i class="far fa-square"></i> Clipboard, pen</li>
                        <li><i class="far fa-square"></i> Mobile phone logged into EarthRanger</li>
                    </ul>
                </div>
                <div class="checklist-box">
                    <h3><i class="fas fa-user"></i> Personal Checklist</h3>
                    <ul class="checklist">
                        <li><i class="far fa-square"></i> Sunscreen</li>
                        <li><i class="far fa-square"></i> Hat/cap</li>
                        <li><i class="far fa-square"></i> Long sleeves</li>
                        <li><i class="far fa-square"></i> Water</li>
                        <li><i class="far fa-square"></i> Mobile phone/camera</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Nest Registration Section -->
    <section id="nest-registration" class="portal-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2><i class="fas fa-clipboard-list"></i> Nest Registration & Confirmation</h2>
                <p>Procedures for registering turtle nesting activity</p>
            </div>

            <!-- Activity ID Format -->
            <div class="info-card">
                <h3><i class="fas fa-hashtag"></i> Activity ID Format</h3>
                <p>Each nesting activity receives a unique identifier: <strong>YYMMDD-BB-TYPE-#</strong></p>
                <div class="format-breakdown">
                    <div class="format-item">
                        <span class="format-code">YYMMDD</span>
                        <span class="format-desc">Date (Year, Month, Day)</span>
                    </div>
                    <div class="format-item">
                        <span class="format-code">BB</span>
                        <span class="format-desc">Two-letter beach code</span>
                    </div>
                    <div class="format-item">
                        <span class="format-code">TYPE</span>
                        <span class="format-desc">D (Dry run), A (Attempt), UN (Unconfirmed), CN (Confirmed), H (Hatching)</span>
                    </div>
                    <div class="format-item">
                        <span class="format-code">#</span>
                        <span class="format-desc">Activity number for that day</span>
                    </div>
                </div>
                <div class="example-box">
                    <p><strong>Example:</strong> 250524-TB-A-2 = May 24, 2025 at Turtle Beach, an Attempt, second activity of the day</p>
                    <p><strong>Example:</strong> 250728-MB-CN-1R = July 28, 2025 at Mermaid Beach, Confirmed nest, first activity, Relocated</p>
                </div>
            </div>

            <!-- Activity Types -->
            <div class="activity-types">
                <h3>Activity Types</h3>
                <div class="activity-cards">
                    <div class="activity-card">
                        <div class="activity-icon dry-run">D</div>
                        <h4>Dry Run</h4>
                        <p>The turtle crawled over the beach and returned without making a body pit.</p>
                    </div>
                    <div class="activity-card">
                        <div class="activity-icon attempt">A</div>
                        <h4>Attempt</h4>
                        <p>The turtle crawled on the beach and made one or more body pits, but didn't lay eggs.</p>
                    </div>
                    <div class="activity-card">
                        <div class="activity-icon nest">N</div>
                        <h4>Nest (Suspected/Confirmed)</h4>
                        <p>The turtle made a body pit and covering pit (fluffy sand visible, sharp edges from covering pit).</p>
                    </div>
                </div>
            </div>

            <!-- Registration Procedures -->
            <div class="procedures-accordion">
                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-walking"></i> Dry Run Registration</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <ol>
                            <li>Start filling in the General information</li>
                            <li>Determine the Activity ID</li>
                            <li>Fill in date/time, observers, location, beach</li>
                            <li>Determine species by tracks</li>
                            <li>Measure crawl width in meters (to closest tenth)</li>
                            <li>Measure crawl length in meters (to closest tenth)</li>
                            <li>Determine crawl width pattern</li>
                            <li>Determine freshness (same night, 1 night, 2 nights, or N/A)</li>
                            <li>In EarthRanger: Take pictures of track in, track out, and location</li>
                            <li><strong>Smooth over the tracks</strong> to prevent double counting</li>
                        </ol>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-times-circle"></i> Attempt Registration</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <ol>
                            <li>Start filling in the General information</li>
                            <li>Determine the Activity ID</li>
                            <li>Fill in date/time, observers, location, beach</li>
                            <li>Determine species by tracks</li>
                            <li>Measure crawl width and length in meters</li>
                            <li>Determine crawl width pattern</li>
                            <li>Determine freshness</li>
                            <li>Determine number of body pits</li>
                            <li>Perform triangulation for last body pit (use Triangulation Field Card)</li>
                            <li>In EarthRanger: Take pictures of track in/out, body pit(s), location, triangulation map</li>
                            <li><strong>Smooth over the tracks</strong> to prevent double counting</li>
                        </ol>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <span><i class="fas fa-egg"></i> Nest Registration</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content">
                        <ol>
                            <li>Start filling in the General Information</li>
                            <li>Determine the Activity ID</li>
                            <li>Fill in date/time, observers, location, beach</li>
                            <li>Determine species by tracks</li>
                            <li>Measure crawl width and length in meters</li>
                            <li>Determine crawl width pattern and freshness</li>
                            <li>Determine number of body pits</li>
                            <li>Confirm the nest (see Nest Confirmation procedure below)</li>
                            <li>Measure distance to high water line in meters</li>
                            <li>Calculate expected hatching date (today + 60 days)</li>
                            <li>Perform triangulation for egg location</li>
                            <li>Determine if nest needs relocation</li>
                            <li>In EarthRanger: Take pictures of track in/out, body pit(s), nest location, first egg, triangulation map</li>
                            <li>Mark nest location with banner, flagging tape, and/or sign</li>
                            <li>If threats exist (pigs, dogs, tourists), cover with pallet riser</li>
                            <li><strong>Remove the crawl</strong> to prevent double counting</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Nest Confirmation -->
            <div class="info-card highlight">
                <h3><i class="fas fa-search"></i> Nest Confirmation Procedure</h3>
                <p>To confirm a suspected nest, follow these steps:</p>
                <ol>
                    <li><strong>Put on gloves</strong> before you start digging</li>
                    <li>Locate the covering hill (hill of sand behind the covering pit) - the egg chamber is underneath</li>
                    <li>Draw a line through the middle of the track (cloaca is always in the middle)</li>
                    <li>Place sticks at the beginning of the covering hill and covering pit</li>
                    <li>Remove +/- 20 cm of the top layer of the covering hill and redraw the line</li>
                    <li>Dig every 20 cm straight down on the line until arm-length deep, then dig horizontally</li>
                    <li>If eggs found: take a quick picture, then replace sand in reverse order</li>
                    <li>Check for and remove corals or plastics in the sand</li>
                    <li>Gently tap sand to firm it, add back 20 cm layer plus extra 20 cm on top</li>
                    <li>Record nest type (confirmed or suspected) in EarthRanger</li>
                </ol>
            </div>

            <!-- Relocation Criteria -->
            <div class="warning-box">
                <h3><i class="fas fa-exclamation-triangle"></i> When to Relocate a Nest</h3>
                <p><strong>Consult with a responsible STCC member immediately if relocation is needed!</strong></p>
                <ul>
                    <li>You can see water in the nest</li>
                    <li>The nest is close to the water line (&lt; 1 meter)</li>
                    <li>The nest has been dug up</li>
                    <li>The nest is shallow or unprotected</li>
                    <li>The nest is very close to a (palm) tree (&lt; 0.5 meter)</li>
                    <li>Lots of clay and roots are in the nest</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Hatching Activity Form Section -->
    <section id="hatching-form" class="portal-section">
        <div class="container">
            <div class="section-header">
                <h2><i class="fas fa-egg"></i> Hatched Nest Review</h2>
                <p>Form and checklist for documenting hatched nests</p>
            </div>

            <!-- Hatching Checklist -->
            <div class="checklist-box large">
                <h3><i class="fas fa-tasks"></i> Hatched Nest Review Checklist</h3>
                <div class="checklist-columns">
                    <ul class="checklist">
                        <li><i class="far fa-square"></i> Depth of first egg measured</li>
                        <li><i class="far fa-square"></i> Sort the different categories and group together per 10</li>
                        <li><i class="far fa-square"></i> Take a picture of the sorted eggs</li>
                        <li><i class="far fa-square"></i> Take a picture of the sorted hatched eggs</li>
                        <li><i class="far fa-square"></i> Take a picture of the sorted dead eggs</li>
                    </ul>
                    <ul class="checklist">
                        <li><i class="far fa-square"></i> Take detailed pictures of eggs with fusarium</li>
                        <li><i class="far fa-square"></i> Take a picture of the dead hatchlings</li>
                        <li><i class="far fa-square"></i> Take 2 samples (DNA & isotope) OR take a dead hatchling in sample bag with Activity ID</li>
                        <li><i class="far fa-square"></i> Put empty shells, eggs and dead hatchlings back in nest and cover with sand</li>
                    </ul>
                </div>
            </div>

            <!-- Hatching Form -->
            <div class="form-preview">
                <h3><i class="fas fa-file-alt"></i> Hatched Nest Review Form</h3>
                <div class="form-grid">
                    <div class="form-section">
                        <h4>General Information</h4>
                        <div class="form-fields">
                            <div class="form-field"><label>Date and Time:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label>Observers:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label>Photographer:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label>GPS Point N:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label>GPS Point W:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label>Old Activity ID:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label>New Activity ID:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label>Species:</label><span class="field-placeholder">Green / Hawksbill / Loggerhead</span></div>
                        </div>
                    </div>
                    <div class="form-section">
                        <h4>Egg Counts</h4>
                        <div class="form-fields">
                            <div class="form-field"><label>Depth first egg (cm):</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label># Hatched/empty shells:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label># Dead eggs in total:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label>Total # eggs:</label><span class="field-placeholder"></span></div>
                        </div>
                    </div>
                    <div class="form-section">
                        <h4>Dead Egg Breakdown (Double Count!)</h4>
                        <div class="form-fields">
                            <div class="form-field"><label># Undeveloped/unfertilised:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label># Early developed (Stage 1) 0-0.5cm:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label># Mid-developed (Stage 2) 0.5-2cm:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label># Late developed (Stage 3) &gt;2cm:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label># Fully developed/pipped (Stage 4):</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label># Unknown stage:</label><span class="field-placeholder"></span></div>
                        </div>
                    </div>
                    <div class="form-section">
                        <h4>Additional Data</h4>
                        <div class="form-fields">
                            <div class="form-field"><label>Fusarium present:</label><span class="field-placeholder">Yes / No</span></div>
                            <div class="form-field"><label>Depth of egg chamber (cm):</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label>Distance to high watermark (cm):</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label># Dead hatchlings:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label># Live hatchlings:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label># Weak hatchlings:</label><span class="field-placeholder"></span></div>
                            <div class="form-field"><label># Deformed hatchlings:</label><span class="field-placeholder"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Important Reminders -->
    <section class="portal-section">
        <div class="container">
            <div class="reminder-box">
                <h3><i class="fas fa-bell"></i> Important Reminders</h3>
                <ul>
                    <li><strong>No Lead Present?</strong> Contact the responsible STCC member for your route before continuing.</li>
                    <li><strong>Take Photos!</strong> The more photos the better - tracks, nests, location from different angles.</li>
                    <li><strong>Always smooth over tracks</strong> after registration to prevent double counting.</li>
                    <li><strong>Use EarthRanger</strong> for all data entry and photo documentation.</li>
                    <li><strong>Expected hatching date</strong> = nesting date + 60 days</li>
                </ul>
            </div>
        </div>
    </section>

<?php
$extraScripts = ['js/portal.js'];
include 'includes/footer.php';
?>
