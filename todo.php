<?php

// Building a Todo List in PHP
// Now that we have a good understanding of arrays, the command line, checking user input, 
// and control structures, it is time to build an application that we'll be revisiting through-out the course.
 
// A Todo List
 
// The Specs
 
// The application should run on command line, should prompt users to add new items, 
// allow them to add text items, and the ability to remove completed items.
 
// After each action, it should display the todo list and the menu.
 
// The Code
// ----------------------------------------------------------------------------------------------------

// Create array to hold list of todo items
$items = [];

function sort_items($items) {
    // Show sort menu options
    fwrite(STDOUT, "\n## Sort Menu");
    fwrite(STDOUT, "\n## (A)-Z, (Z)-A, (O)rder numerically, (R)everse numerically, (C)ancel : ");
    // Get input from user
    $sort = strtoupper(trim(fgets(STDIN))); 

    if($sort == 'A') {
        asort($items);
    } elseif ($sort == 'Z') {
        arsort($items);
    } elseif ($sort == 'O') {
        ksort($items);
    } elseif ($sort == 'R') {
        krsort($items);
    } 
    // elseif ($sort == 'C') {
    //     // Exit sort menu and continue to loop
    //     continue 2;
    // }
    return $items;
}
 
// The loop!
do {
    // Display to-do list title
    fwrite(STDOUT, "\n----------------------");
    fwrite(STDOUT, "\n----- To-do List -----");
    fwrite(STDOUT, "\n----------------------\n");

    // Iterate through list items
    foreach ($items as $key => $item) {
        // Start list numbering at one instead of zero
        $key += 1;
        // Display each item and a newline
        fwrite(STDOUT, "[{$key}] {$item}\n");
    }
 
    // Show the menu options
    fwrite(STDOUT, "\n# Main Menu");
    fwrite(STDOUT, "\n# (N)ew item, (D)elete item, (S)ort, (R)enumber, (Q)uit : ");
 
    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = strtoupper(trim(fgets(STDIN)));

    // If user does not enter a set menu option, prompt them to do so
    // while ($input != 'N' || $input != 'D' || $input != 'S' || $input != 'R' || $input != 'Q') {
    //     fwrite (STDOUT, "\n>> Choose from menu options only: N, D, S, R, or Q : ");
    //     $input = strtoupper(trim(fgets(STDIN)));
    // }
 
    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        fwrite(STDOUT, "\n## Enter item : ");
        // Add entry to list array
        $items[] = trim(fgets(STDIN));

    } elseif ($input == 'D') {
        // Remove which item?
        fwrite(STDOUT, "\n## Enter item [number] to delete : ");
        // Get item to remove from user
        $k = trim(fgets(STDIN));
        // Remove from array
        unset($items[$k - 1]);

    } elseif ($input == 'S') {
        // Call sort_menu() function and reassign sorted items to the $items variable;
        $items = sort_items($items);

    } elseif ($input == 'R') {
        // Specify what (R)enumber will do and ask user if they want to continue with this action
        fwrite (STDOUT, "\n## Keep current order and renumber starting at one?");
        fwrite (STDOUT, "\n## (Y)es, (N)o : ");
        // Get user input
        $renumber = strtoupper(trim(fgets(STDIN)));
        // If "yes", re-number list
        if ($renumber == 'Y') {
            $items = array_values($items);
        } else {
            // Otherwise, continue with loop
            continue;
        }
    } 

// Exit when input is (Q)uit
} while ($input != 'Q');
 
// Say Goodbye!
fwrite(STDOUT, "\n>> Goodbye!\n");
 
// Exit with 0 errors
exit(0);

// ----------------------------------------------------------------------------------------------------
// Most of this code should be very familiar by now, but we have introduced a few new items.
 
// trim() removed whitespace and special characters from strings. See the PHP man page for trim().
 
// We used a do/while instead of another control structure. This allowed us to enter our loop, 
// and pause at the user input area until the user decides to (Q)uit.
 
// We used unset() to remove array elements. See the PHP man page for unset().
 
// Exercises
 
// Create a new directory in your vagrant-lamp directory named todo_list with a file named todo.php 
// containing the code above. Use git init to initialize a new local repository in that directory 
// and commit your code. Create a new remote repository on GitHub called CLI_Todo_List 
// and add the remote to your local repository so you can push your code.
 
// After each exercise item, commit and push changes to your GitHub repository.
 
// Update the code to allow upper and lowercase inputs from user for all menu items. 
// Test adding, removing, and quitting.
 
// Update the program to start numbering the list with 1 instead of 0. 
// Make sure remove still works as expected.

