# Hero Section Component Enhancements

## Overview
The Hero Section page block has been enhanced to support a hero image feature, allowing users to add a descriptive image that represents their business or organization alongside the hero content.

## Changes Made

### 1. Backend Changes (PHP)

#### File: `app/Filament/Fabricator/PageBlocks/HeroSectionBlock.php`

- **Added Hero Image Field**: New `hero_image` field with the following properties:
  - Type: FileUpload
  - Max Size: 2048KB
  - Image Editor: Enabled
  - Aspect Ratios: 1:1, 4:5, 3:4 (optimized for portrait/vertical images)
  - Label: "Hero Image (Right Side)"

- **Updated Background Image Field**: Added descriptive label "Background Image" for clarity

### 2. Frontend Changes (Blade Template)

#### File: `resources/views/components/filament-fabricator/page-blocks/hero-section.blade.php`

- **Conditional Layout Implementation**:
  - **With Hero Image**: Two-column flex layout with optimized spacing
    - Left column (41.67%): Title, description, and buttons (left-aligned on large screens, centered on mobile)
    - Right column (50%): Hero image aligned to bottom
    - Reduced gap between columns for better visual connection
  - **Without Hero Image**: Single column centered layout (original design)

- **Responsive Design**:
  - Mobile: Stacked layout with hero image below content
  - Desktop: Side-by-side layout with proper spacing

- **Text Size Adjustments**:
  - **With Hero Image**: Reduced text sizes for better visual balance
    - Title: `text-3xl sm:text-4xl lg:text-5xl` (reduced from `text-4xl md:text-5xl`)
    - Description: `text-lg` (reduced from `text-xl`)
  - **Without Hero Image**: Original text sizes preserved

- **Hero Image Styling**:
  - Responsive sizing: 288×288px (mobile), 320×320px (tablet), 384×384px (desktop), 448×448px (extra large)
  - Rounded corners and shadow effects
  - Object-cover for proper image scaling
  - Positioned at bottom of container
  - Larger image sizes for better visual impact, especially on mobile devices

- **Preserved Animations**: All existing x-intersect animations maintained in both layouts

## Usage

### Adding a Hero Image
1. In the Filament admin panel, navigate to the page editor
2. Add or edit a Hero Section block
3. Upload an image using the "Hero Image (Right Side)" field
4. The image will automatically appear on the right side of the hero content

### Best Practices
- Use portrait or square images for best results
- Recommended aspect ratios: 1:1, 4:5, or 3:4
- The hero image works best with images that represent your business or organization
- Consider using a logo, product image, or team photo

## Technical Notes

- The hero image is optional - if not provided, the component maintains its original single-column layout
- Both background image and hero image can be used simultaneously
- Images are stored in the storage directory and accessed via the `asset()` helper
- The component maintains backward compatibility with existing content
- All existing animations and interactions are preserved in both layout modes

## Comparison with Jumbotron Component

The Hero Section enhancements follow the same philosophy as the Jumbotron component:
- Same field configuration for the hero image
- Similar conditional layout approach
- Consistent responsive design patterns
- Matching text size adjustments for visual balance

The main difference is that the Hero Section maintains its button functionality and gradient background, while the Jumbotron focuses on a simpler text presentation.