# FusionPBX Custom Theme for Tathya Technologies

## Overview

This repository contains a comprehensive FusionPBX theme customization project designed specifically for **Tathya Technologies Private Limited**. The theme features modern UI elements, glass morphism design, and extensive customization capabilities while maintaining full FusionPBX functionality.

## Repository Structure

```
fusionpbx-custom/
├── css.php                 # Main CSS generation engine (3,658 lines)
├── template.php            # Primary Smarty template file
├── app_config.php          # Theme configuration settings (2,931 lines)
├── app_default.php         # Default application settings
├── config.php              # Button and icon configurations
├── theme.zip               # Packaged theme archive
├── themes/
│   └── default/
│       └── css.php         # Modern CSS with glass morphism (439 lines)
└── readme.md               # Basic project information
```

## Key Features

### 🎨 Modern Design Elements
- **Glass Morphism UI**: Translucent panels with backdrop blur effects
- **CSS Custom Properties**: Extensive use of CSS variables for easy customization
- **Responsive Design**: Mobile-first approach with adaptive layouts
- **System Fonts**: Uses native system fonts for optimal performance
- **Smooth Animations**: CSS transitions with easing functions

### 🛠️ Customization Capabilities
- **200+ Theme Variables**: Comprehensive theming system with granular control
- **Color Schemes**: Primary, secondary, accent colors with hover states
- **Typography**: Font family, size, weight, and spacing controls
- **Layout Options**: Menu positioning, sidebar states, and container widths
- **Component Styling**: Buttons, inputs, forms, and navigation elements

### 🔧 Technical Features
- **PHP-Generated CSS**: Dynamic CSS generation based on session variables
- **Smarty Templating**: Clean separation of logic and presentation
- **Bootstrap Integration**: Built on Bootstrap framework for consistency
- **FontAwesome Icons**: Complete icon library integration
- **Cross-browser Compatibility**: Modern CSS with fallbacks

## Installation & Deployment

### Prerequisites
- FusionPBX installation (any recent version)
- PHP 7.4+ with required extensions
- Web server (Apache/Nginx) with PHP support
- File system access to FusionPBX themes directory

### Installation Steps

1. **Backup Current Theme**
   ```bash
   cp -r /var/www/fusionpbx/themes/default /var/www/fusionpbx/themes/default.backup
   ```

2. **Deploy Custom Theme**
   ```bash
   # Copy theme files to FusionPBX installation
   cp -r themes/default/* /var/www/fusionpbx/themes/default/
   cp css.php /var/www/fusionpbx/themes/default/
   cp template.php /var/www/fusionpbx/themes/default/
   cp config.php /var/www/fusionpbx/themes/default/
   ```

3. **Set Proper Permissions**
   ```bash
   chown -R www-data:www-data /var/www/fusionpbx/themes/default/
   chmod -R 644 /var/www/fusionpbx/themes/default/*.php
   ```

4. **Clear Cache**
   ```bash
   # Clear any cached CSS files
   rm -f /var/www/fusionpbx/themes/default/css_cache/*
   ```

### Configuration

#### Theme Settings
The theme can be configured through the FusionPBX web interface:
1. Navigate to **Advanced → Default Settings**
2. Filter by category: **theme**
3. Modify values as needed for your branding

#### Key Configuration Areas

**Brand Colors**
```php
// Primary brand colors
$primary_color = '#1E90FF';        // Tathya blue
$primary_dark = '#1873CC';         // Darker variant
$success_color = '#34C759';        // Success green
$warning_color = '#FF9500';        // Warning orange
$danger_color = '#FF3B30';         // Error red
```

**Typography**
```php
// Font settings
$system_font = '-apple-system, BlinkMacSystemFont, "SF Pro Text", "Segoe UI", Roboto, Helvetica, Arial, sans-serif';
$display_font = '-apple-system, BlinkMacSystemFont, "SF Pro Display", "Segoe UI", Roboto, Helvetica, Arial, sans-serif';
```

**Layout Options**
```php
// Menu configuration
$menu_position = 'top';            // top, side, or bottom
$menu_style = 'fixed';             // fixed, static, or inline
$menu_side_width = 225;            // Sidebar width in pixels
```

## Development Workflow

### Local Development Setup

1. **Clone Repository**
   ```bash
   git clone https://github.com/mikan-senpai/fusionpbx-custom.git
   cd fusionpbx-custom
   ```

2. **Development Server** (Optional)
   ```bash
   # For CSS development, you can use a simple PHP server
   php -S localhost:8000 -t themes/default/
   ```

3. **CSS Development**
   - Edit `themes/default/css.php` for modern styling
   - Edit `css.php` for comprehensive theme variables
   - Test changes in browser with developer tools

### Customization Guidelines

#### ⚠️ Important: Maintain Functionality
- **Never remove core CSS classes** used by FusionPBX JavaScript
- **Test all interactive elements** after styling changes
- **Preserve responsive breakpoints** for mobile compatibility
- **Maintain accessibility standards** (contrast ratios, focus states)

#### Safe Customization Areas
✅ **Colors and Branding**
- Background colors and gradients
- Text colors and hover states
- Brand logos and imagery
- Icon colors and styles

✅ **Typography**
- Font families and sizes
- Line heights and spacing
- Text weights and styles

✅ **Layout and Spacing**
- Margins and padding
- Border radius and shadows
- Container widths and heights

✅ **Animations and Effects**
- Transition durations and easing
- Hover and focus effects
- Glass morphism parameters

#### Areas Requiring Caution
⚠️ **Layout Structure**
- Grid systems and flexbox layouts
- Menu positioning and navigation
- Form layouts and input groupings

⚠️ **JavaScript Dependencies**
- CSS classes used by jQuery plugins
- Bootstrap component styling
- Dynamic content containers

## File Descriptions

### Core Files

#### `css.php` (3,658 lines)
The main CSS generation engine that:
- Processes 200+ theme variables from session data
- Generates dynamic CSS based on user preferences
- Handles responsive design and browser compatibility
- Manages color schemes and typography settings

#### `template.php` (1,200+ lines)
Primary Smarty template that:
- Defines HTML structure and layout
- Integrates CSS and JavaScript resources
- Handles responsive navigation and menus
- Manages user authentication and session data

#### `themes/default/css.php` (439 lines)
Modern CSS implementation featuring:
- CSS custom properties (variables)
- Glass morphism design system
- Modern reset and base styles
- Component-specific styling

#### `app_config.php` (2,931 lines)
Comprehensive configuration file containing:
- Theme metadata and versioning
- 200+ default theme settings
- Multi-language descriptions
- Setting categories and validation

### Supporting Files

#### `config.php`
Defines UI element configurations:
- Button styles and icons
- Form control appearances
- Interactive element states

#### `app_default.php`
Contains default application settings and permissions for the theme module.

## Branding for Tathya Technologies

### Current Brand Elements
- **Primary Color**: Modern blue (#1E90FF)
- **Typography**: System fonts for optimal performance
- **Design Language**: Glass morphism with subtle shadows
- **Layout**: Clean, modern interface with intuitive navigation

### Customization Recommendations

1. **Logo Integration**
   - Replace default FusionPBX logo with Tathya Technologies branding
   - Update favicon and login page imagery
   - Customize loading screens and splash pages

2. **Color Scheme**
   - Implement Tathya's brand colors throughout the interface
   - Ensure proper contrast ratios for accessibility
   - Create consistent hover and active states

3. **Typography**
   - Consider custom web fonts if brand guidelines require
   - Maintain readability across all device sizes
   - Implement consistent heading hierarchy

## Browser Compatibility

### Supported Browsers
- **Chrome/Chromium**: 88+
- **Firefox**: 85+
- **Safari**: 14+
- **Edge**: 88+

### Progressive Enhancement
- Core functionality works in older browsers
- Advanced visual effects (backdrop-filter) degrade gracefully
- CSS Grid and Flexbox provide layout fallbacks

## Performance Considerations

### Optimization Features
- **CSS Compression**: Minified output in production
- **Caching Headers**: Proper cache control for static assets
- **System Fonts**: No external font loading delays
- **Efficient Selectors**: Optimized CSS for fast rendering

### Best Practices
- Use CSS custom properties for theme consistency
- Minimize HTTP requests through file concatenation
- Optimize images and icons for web delivery
- Implement lazy loading for non-critical resources

## Troubleshooting

### Common Issues

#### CSS Not Loading
```bash
# Check file permissions
ls -la /var/www/fusionpbx/themes/default/css.php

# Verify PHP syntax
php -l /var/www/fusionpbx/themes/default/css.php

# Clear browser cache and reload
```

#### Layout Breaking
- Check for missing CSS classes in custom modifications
- Verify Bootstrap grid system integrity
- Test responsive breakpoints on different devices

#### Performance Issues
- Monitor CSS file size (should be < 500KB)
- Check for CSS selector efficiency
- Verify image optimization and compression

### Debug Mode
Enable CSS debugging by adding to the top of `css.php`:
```php
// Debug mode - shows CSS generation time and variables
$debug_mode = true;
if ($debug_mode) {
    echo "/* CSS Generated: " . date('Y-m-d H:i:s') . " */\n";
    echo "/* Variables loaded: " . count($_SESSION['theme']) . " */\n";
}
```

## Contributing

### Development Standards
- Follow PSR-12 coding standards for PHP
- Use consistent indentation (4 spaces)
- Comment complex CSS calculations and logic
- Test changes across multiple browsers and devices

### Git Workflow
```bash
# Create feature branch
git checkout -b feature/new-styling

# Make changes and test
# Commit with descriptive messages
git commit -m "feat: add glass morphism to dashboard cards"

# Push and create pull request
git push origin feature/new-styling
```

## Security Considerations

### Input Validation
- All theme variables are sanitized before CSS output
- User input is escaped to prevent CSS injection
- File permissions restrict unauthorized modifications

### Best Practices
- Regular security updates for dependencies
- Proper file permissions on theme directories
- Input validation for all user-configurable values

## Support and Maintenance

### Regular Maintenance Tasks
1. **Monthly**: Review and update color schemes
2. **Quarterly**: Test compatibility with FusionPBX updates
3. **Annually**: Audit accessibility compliance and performance

### Getting Help
- Review FusionPBX documentation for core functionality
- Check browser developer tools for CSS debugging
- Test changes in staging environment before production

## License

This theme customization is provided under the Mozilla Public License 1.1, maintaining compatibility with FusionPBX's licensing requirements.

---

**Last Updated**: May 28, 2025  
**Version**: 1.0  
**Maintained by**: Tathya Technologies Development Team