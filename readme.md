---
# The Maxenius WordPress Developer Challenge
The purpose of this challenge is to test and measure a WordPress engineer's ability to interpret and implement the functionality that supports a provided design. In this document, we will present you with a scenario that is intended to help showcase your engineering talents and spark creative thinking and problem solving. We will be watching both the journey and the final product.

## Background
A private airplane broker would like to run a marketing campaign aimed at attracting pilots and building a community of flying enthusiasts. This campaign directs prospects to a landing page that allows them to upload a CSV containing their favorite airports. The CSV is then ingested, and transformed into a shareable public map, showcasing the user’s submitted airports according to their latitude and longitude.

## The Design
The design is available at this URL:
https://www.figma.com/file/Q5gVQnqVP3lpNBWratzbMm/Wonderful-WordPress-Engineer-Code-Challenge?node-id=0%3A1

## Expected Delivery
- A URL to view your webpage
- A reviewable copy of the codebase stored in a repo Wonderful will clone
- The ability to chat through your process and decisions (after submission)

## Requirements
- Use the provided mocks and assets to create a simple WordPress installation. You will need to lean on your judgement, **as the mock is intentionally vague** as to how to handle things like empty states, UI interactions, and the like.
- Use provided CSV as an example of what a user might upload (it is okay to assume they will always match the format of the provided CSV).
- Upon a successful CSV upload, a single "Submissions" _Custom Post Type_ should be created. Each airport should be represented with this custom post type as a set of _Custom Fields_.
	- The _Custom Post Type_ should be created **programmatically**
	- It is **okay** to use a plugin to enable various _Custom Fields_ on the _Custom Post Type_
- **Please use Google Maps to create a map** that allows users to select markers which show simple tooltips (or infowindows) with information about each uploaded airport.
- Use your best judgement as to how to implement a mobile breakpoint.
- Users should be presented with a unique URL that they may share with others, so that others may see the airports that they uploaded.

## The Rules
- There is no time limit, but the client is eager to review your work. Balance scope, level of professionalism, and your schedule.
- Use any resource or library that you think is *best for the project*. However, you must be able to justify and attribute any external resource.
- You can ask as many questions you need to anybody at Wonderful. We have been working with this client for many years and can provide answers or feedback, or validate any assumptions.

## You will be graded on:
- **PHP**: The resilience, strategy, and organization of your PHP
- **WordPress**: your knowledge of WordPress best practices
- **JavaScript**: the elegance, efficiency, and performance of any JavaScript
- **HTML**: Your understanding of best HTML practices
- **Creativity**: Your creative intuition as to how to "fill in the gaps" that are missing within the design
- **Execution**: Your development speed, compared to the quality of the delivered product
- **Organization**: How easy it would be for another developer to hop into the project and work with you
- **Knowledge**: our understanding of the quality of your development process

✨ Thanks! Good luck!