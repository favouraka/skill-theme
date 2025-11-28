# Jumbotron Component Enhancements

## Overview
The Jumbotron page block has been enhanced to support a hero image feature, allowing users to add a descriptive image that represents their business or organization.

## Changes Made

### 1. Backend Changes (PHP)

#### File: `app/Filament/Fabricator/PageBlocks/Jumbotron.php`

- **Added Hero Image Field**: New `hero_image` field with the following properties:
  - Type: FileUpload
  - Max Size: 2048KB
  - Image Editor: Enabled
  - Aspect Ratios: 1:1, 4:5, 3:4 (optimized for portrait/vertical images)
  - Label: "Hero Image (Right Side)"

- **Enhanced Title Field**: Added 140 character limit to prevent overly long titles
  ```php
  TextInput::make('title')->maxLength(140)
  ```

- **Updated Background Image Field**: Added descriptive label "Background Image" for clarity

### 2. Frontend Changes (Blade Template)

#### File: `resources/views/components/filament-fabricator/page-blocks/jumbotron.blade.php`

- **Conditional Layout Implementation**:
  - **With Hero Image**: Two-column flex layout
    - Left column (50%): Title and subheading
    - Right column (50%): Hero image aligned to bottom
  - **Without Hero Image**: Single column centered layout (original design)

- **Responsive Design**:
  - Mobile: Stacked layout with hero image below text
  - Desktop: Side-by-side layout with proper spacing

- **Text Size Adjustments**:
  - **With Hero Image**: Reduced text sizes for better visual balance
    - Title: `text-3xl sm:text-4xl lg:text-5xl` (reduced from `text-4xl sm:text-5xl lg:text-6xl`)
    - Subheading: `text-lg` (reduced from `text-xl`)
  - **Without Hero Image**: Original text sizes preserved

- **Hero Image Styling**:
  - Responsive sizing: 192×192px (mobile), 256×256px (tablet), 320×320px (desktop)
  - Rounded corners and shadow effects
  - Object-cover for proper image scaling
  - Positioned at bottom of container

## Usage

### Adding a Hero Image
1. In the Filament admin panel, navigate to the page editor
2. Add or edit a Jumbotron block
3. Upload an image using the "Hero Image (Right Side)" field
4. The image will automatically appear on the right side of the title text

### Best Practices
- Use portrait or square images for best results
- Recommended aspect ratios: 1:1, 4:5, or 3:4
- Keep titles concise (140 character limit)
- The hero image works best with images that represent your business or organization

## Technical Notes

- The hero image is optional - if not provided, the component maintains its original single-column layout
- Both background image and hero image can be used simultaneously
- Images are stored in the storage directory and accessed via the `asset()` helper
- The component maintains backward compatibility with existing content