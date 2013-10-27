Exercise description
=====================

Write classes to represent 3 different types of Ant - Worker, Queen and Soldier.

Each Ant has a floating-point health property, which is not writable externally and upon creation is set to a value of 100 (percent).

Each Ant has a Damage() method that takes a single integer parameter that should be a value between 0 and 100. When this method is called, the health of the ant is to be reduced by that percentage of their current health.

When a Soldier has a health below 66%, it is injured and cannot fight and therefore is pronounced Dead. When a Queen has a health below 20%, or a Worker below 50%, it is pronounced dead.

When an Ant is dead, no further health deductions should be recorded by the Ant, although the Damage() method should still be able to be invoked without error.

Your script should create a single list containing 10 instances of each type of Ant. It must support methods to allow Damage() to be called for each Ant, and to return the health status of each Ant, including whether it is alive or not.

The user interface should show the current status of each Ant and contain a button.

When clicked, a different random value between 0 and 80 should be selected for each Ant and applied with a call to Damage(). After each click the page should refresh to show the health status of the ants.

The code should be able to be run on a standard install of PHP 5.3, and should include all files necessary to run the web application

Keep it as simple as possible.
