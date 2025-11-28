document.addEventListener('DOMContentLoaded', function () {
    // Function to add icon previews to select options
    function addIconPreviews() {
        const selectsWithIcons = document.querySelectorAll('[data-select-with-icon="true"]');

        selectsWithIcons.forEach(select => {
            // Skip if already processed
            if (select.dataset.iconPreviewAdded) return;
            select.dataset.iconPreviewAdded = 'true';

            // Add custom styles for icon preview
            const style = document.createElement('style');
            style.textContent = `
                .heroicon-select-option {
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    padding: 4px 8px;
                }
                .heroicon-select-option svg {
                    width: 20px;
                    height: 20px;
                    flex-shrink: 0;
                }
                .heroicon-select-option span {
                    flex-grow: 1;
                }
                .heroicon-select-preview {
                    display: flex;
                    align-items: center;
                    gap: 8px;
                }
                .heroicon-select-preview svg {
                    width: 20px;
                    height: 20px;
                }
            `;
            document.head.appendChild(style);

            // Function to get SVG for an icon
            function getIconSvg(iconName) {
                // Try to get the icon from the page if it's already loaded
                const existingIcon = document.querySelector(`[data-heroicon="${iconName}"]`);
                if (existingIcon) {
                    return existingIcon.cloneNode(true);
                }

                // Create a placeholder SVG with the icon name
                const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                svg.setAttribute('fill', 'none');
                svg.setAttribute('viewBox', '0 0 24 24');
                svg.setAttribute('stroke', 'currentColor');
                svg.setAttribute('stroke-width', '1.5');

                const text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                text.setAttribute('x', '12');
                text.setAttribute('y', '12');
                text.setAttribute('text-anchor', 'middle');
                text.setAttribute('dominant-baseline', 'middle');
                text.setAttribute('font-size', '8');
                text.setAttribute('fill', 'currentColor');
                text.textContent = iconName.replace('heroicon-o-', '').substring(0, 3);

                svg.appendChild(text);
                return svg;
            }

            // Enhance the dropdown options
            const observer = new MutationObserver(function (mutations) {
                mutations.forEach(function (mutation) {
                    if (mutation.type === 'childList') {
                        const options = select.querySelectorAll('option');
                        options.forEach(option => {
                            if (option.dataset.iconEnhanced) return;

                            const iconValue = option.value;
                            if (iconValue && iconValue.startsWith('heroicon-o-')) {
                                const iconSvg = getIconSvg(iconValue);
                                const displayName = option.textContent;

                                // Create a container for the option content
                                const container = document.createElement('div');
                                container.className = 'heroicon-select-option';

                                // Clone the SVG and add text
                                const iconClone = iconSvg.cloneNode(true);
                                const textSpan = document.createElement('span');
                                textSpan.textContent = displayName;

                                container.appendChild(iconClone);
                                container.appendChild(textSpan);

                                // Replace option text with HTML container
                                option.textContent = '';
                                option.appendChild(container);
                                option.dataset.iconEnhanced = 'true';
                            }
                        });
                    }
                });
            });

            // Start observing the select for changes
            observer.observe(select, {
                childList: true,
                subtree: true
            });

            // Enhance the selected value display
            function enhanceSelectedDisplay() {
                const selectedOption = select.querySelector('option:checked');
                if (selectedOption && !select.dataset.selectedEnhanced) {
                    const iconValue = selectedOption.value;
                    if (iconValue && iconValue.startsWith('heroicon-o-')) {
                        select.dataset.selectedEnhanced = 'true';

                        // Add a custom class to the select for styling
                        select.classList.add('heroicon-select-enhanced');
                    }
                }
            }

            // Initial enhancement
            enhanceSelectedDisplay();

            // Update when selection changes
            select.addEventListener('change', enhanceSelectedDisplay);
        });
    }

    // Run the function
    addIconPreviews();

    // Also run after a short delay to catch dynamically loaded selects
    setTimeout(addIconPreviews, 500);

    // Run again when Filament panels are loaded
    if (window.Filament) {
        window.Filament.$hook('component:mounted', () => {
            setTimeout(addIconPreviews, 100);
        });
    }
});