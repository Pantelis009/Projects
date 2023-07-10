#!/bin/bash
# This file is for Part 1 of the coursework
# Write your for loop below:

for i in {1..20}; do
    output_file="output$(printf "%02d" $i).txt"
    echo "Running trial $i and saving output to $output_file"
    ./trial > "$output_file"
done
