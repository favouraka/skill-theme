# Logo Strip Component Documentation

## Overview

The Logo Strip component is a page builder block that displays partner and sponsor logos in an infinitely scrolling horizontal strip. It features customizable headings, scroll behavior, and interactive hover effects.

## Features

- **Editable Content**: Customizable heading and subheading
- **Logo Management**: Upload multiple logos with optional links
- **Scroll Control**: Adjustable direction and speed
- **Visual Effects**: Monochrome logos that colorize on hover
- **Responsive Design**: Optimized for all screen sizes
- **Accessibility**: Full support for screen readers and reduced motion preferences

## Configuration Options

### Content Settings
- **Heading**: Main title displayed above the logo strip
- **Subheading**: Optional descriptive text below the heading

### Scroll Settings
- **Direction**: 
  - Left to Right: Logos move from left to right
  - Right to Left: Logos move from right to left
- **Speed**:
  - Slow: 30-second animation cycle
  - Normal: 20-second animation cycle (default)
  - Fast: 10-second animation cycle
- **Pause on Hover**: Stops animation when users hover over the logo strip

### Logo Configuration
For each logo, you can configure:
- **Image**: Upload logo file (supports common image formats)
- **Link URL**: Optional destination when logo is clicked
- **Alt Text**: Accessibility description for screen readers

## Technical Implementation

### File Structure
```
app/Filament/Fabricator/PageBlocks/LogoStripBlock.php
resources/views/components/filament-fabricator/page-blocks/logo-strip.blade.php
```

### CSS Features
- **Infinite Animation**: Seamless looping using CSS keyframes
- **Monochrome Filter**: Grayscale effect with color on hover
- **Responsive Breakpoints**: Optimized sizing for mobile, tablet, and desktop
- **Reduced Motion Support**: Respects user accessibility preferences

### JavaScript Functionality
- **Performance Optimization**: Intersection observer pauses animation when not visible
- **Accessibility**: Detects and respects `prefers-reduced-motion` setting
- **Touch Support**: Fallback to horizontal scrolling on mobile devices with enhanced touch gestures

### Mobile Scrolling Enhancements
- **Automatic Scrolling**: Maintains animation on mobile devices for consistent behavior
- **Smooth Touch Scrolling**: Uses `touch-action: pan-x` for fluid horizontal scrolling
- **Improved User Experience**: Prevents accidental text selection with `user-select: none`
- **Optimized Container**: Proper overflow handling with `overflow-x: auto`
- **Enhanced Track Width**: Uses `min-width: 100%` to ensure scrollable area
- **Clean UI**: Maintains hidden scrollbars for uncluttered appearance
- **Interactive Control**: Animation pauses when user touches the strip for manual scrolling

## Usage Instructions

1. **Add the Block**: In the page builder, select "Logo Strip" from available blocks
2. **Configure Content**: Enter heading and optional subheading
3. **Set Scroll Behavior**: Choose direction, speed, and hover pause option
4. **Upload Logos**: Add at least one logo using the repeater
5. **Customize Logos**: For each logo, upload image, add optional link, and provide alt text
6. **Save and Preview**: Test the scrolling behavior and hover effects

## Design Specifications

### Visual Appearance
- **Background**: Light gray (bg-gray-50)
- **Logo Treatment**: Monochrome with 70% opacity, full color on hover
- **Hover Effects**: Scale to 110% and transition to full color
- **Spacing**: Consistent 32px (8 * 4px) horizontal margins

### Responsive Breakpoints
- **Mobile**: Logo height of 48px (h-12)
- **Tablet**: Logo height of 64px (h-16)
- **Desktop**: Logo height of 80px (h-20)

### Animation Performance
- **GPU Acceleration**: Uses `transform` and `will-change` for smooth animation
- **Memory Efficient**: Duplicates content for seamless looping without JavaScript
- **Battery Conscious**: Pauses when not visible to conserve resources

## Accessibility Features

### Screen Reader Support
- **Alt Text**: Required for all logo images
- **Semantic HTML**: Proper heading structure and link context
- **Keyboard Navigation**: Full keyboard access to linked logos

### Motion Preferences
- **Reduced Motion**: Automatically disables animations for users who prefer it
- **Fallback Navigation**: Touch scrolling on mobile devices when animations are disabled
- **Pause Control**: Optional hover pause for users who need control

## Browser Compatibility

### Modern Browsers (Full Support)
- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

### Legacy Support
- **IE11**: Basic functionality without animations
- **Older Mobile**: Fallback to static display with horizontal scrolling

## Troubleshooting

### Common Issues

**Animation not working:**
- Check if `prefers-reduced-motion` is enabled in browser settings
- Verify JavaScript is enabled and no console errors
- Ensure logos are properly uploaded and accessible

**Logos appear distorted:**
- Upload high-quality logo images with transparent backgrounds
- Ensure logos have appropriate aspect ratios
- Check image file size (max 2MB per logo)

**Mobile scrolling issues:**
- Test on actual mobile devices (not just desktop simulation)
- Verify automatic scrolling works on mobile devices
- Check that touch scrolling works when user interacts with the strip
- Ensure touch-action: pan-x is properly applied for smooth horizontal scrolling
- Confirm user-select: none prevents accidental text selection during scrolling
- Verify animation pauses when user touches the strip for manual control

**Performance concerns:**
- Limit number of logos (recommended 6-12 unique logos)
- Optimize image files before uploading
- Monitor animation performance on lower-end devices

## Best Practices

1. **Logo Quality**: Use high-resolution logos with transparent backgrounds
2. **File Size**: Keep individual logo files under 500KB when possible
3. **Consistency**: Maintain similar visual weight across all logos
4. **Links**: Use meaningful URLs that provide value to users
5. **Alt Text**: Be descriptive but concise (e.g., "Company Name logo")

## Future Enhancements

Potential improvements for future versions:
- Logo categorization and filtering
- Dynamic logo loading from external sources
- Advanced animation patterns (fade, zoom, etc.)
- Integration with partner management systems
- A/B testing support for different logo arrangements