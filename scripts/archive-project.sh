#!/bin/bash

# Get the current date and time for the archive name
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
ARCHIVE_NAME="project_${TIMESTAMP}.zip"

echo "Creating project archive: $ARCHIVE_NAME"
echo "Excluding: node_modules, public/storage, storage/logs, db_dumps"

# Create zip with exclusions
zip -r "$ARCHIVE_NAME" . \
    -x "node_modules/*" \
    -x "public/storage/*" \
    -x "storage/logs/*" \
    -x "db_dumps/*" \
    -x "*.DS_Store" \
    -x ".git/*" \
    -x "*.log"

echo "Archive created successfully: $ARCHIVE_NAME"
echo "Size: $(du -h "$ARCHIVE_NAME" | cut -f1)"