#!/bin/bash
set -e

echo "Creating schema..."
psql -d postgres -a -U postgres -f /schema.sql

echo "Populating database..."
psql -d postgres -a -U postgres -f /data.sql
