<?php
/**
 * Head section - CSS, fonts, meta tags
 *
 * Set these variables before including:
 * $pageTitle - The page title (will be appended with site name)
 * $basePath - Path prefix for assets (default: '' for root, '../' for subdirectories)
 */
$basePath = isset($basePath) ? $basePath : '';
$siteTitle = 'Sea Turtle Conservation Curaçao';
$fullTitle = isset($pageTitle) ? $pageTitle . ' - ' . $siteTitle : $siteTitle;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $fullTitle; ?></title>
    <link rel="stylesheet" href="<?php echo $basePath; ?>css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
