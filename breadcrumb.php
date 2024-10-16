
<?php
function createBreadcrumb()
{
    // Get the current URL path (excluding domain)
    $url = $_SERVER['REQUEST_URI'];  // e.g., "/category/product"
    $url = trim($url, '/');          // Remove leading/trailing slashes

    // Split the URL into segments
    $segments = explode('/', $url);

    // Custom names for specific segments (optional)
    $customNames = [
        'noonpost' => 'NoonPost',
        'about' => 'About Us',
        'contact' => 'Contact',
        'blogs' => 'Blogs',
        // Add more as needed
    ];

    // Start breadcrumb HTML
    $breadcrumb = '<nav aria-label="breadcrumb"><ol class="breadcrumb">';
    $breadcrumb .= '<li class="breadcrumb-item"><a href="/">Home</a></li>'; // Link to the homepage

    // Build the breadcrumb dynamically based on URL segments
    $path = ''; // To build the URL for each breadcrumb segment
    foreach ($segments as $key => $segment) {
        // Skip empty segments
        if (empty($segment)) continue;

        // Clean the segment and apply custom names if available
        $segment = str_replace(".php", "", $segment); // Remove ".php" extension if present
        $name = isset($customNames[$segment]) ? $customNames[$segment] : ucfirst($segment); // Apply custom name or capitalize

        // Build the path for each breadcrumb item
        $path .= '/' . $segment;

        // If it's the last segment, make it active (no link)
        if ($key == count($segments) - 1) {
            $breadcrumb .= '<li class="breadcrumb-item active" aria-current="page">' . $name . '</li>';
        } else {
            // Link for intermediate segments
            $breadcrumb .= '<li class="breadcrumb-item"><a href="' . $path . '">' . $name . '</a></li>';
        }
    }

    // Close the breadcrumb HTML
    $breadcrumb .= '</ol></nav>';

    // Output the breadcrumb
    echo $breadcrumb;
}
?>