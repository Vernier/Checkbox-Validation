/¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯\
|     » Copyright Notice «      |
|¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯| 
| » Checkbox Validation         |
|   1.1 © 2012                  |
| » Released free of charge     |
| » You may edit or modify      |
|   this plugin, however you    |
|   may not redistribute it.    |
| » This notice must stay       |
|   intact for legal use.       |
|  » For support, please visit  |
|    http://vernier.me          |
/¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯\
|    » Checkbox Validation «    |
|         » 1.1 © 2012 «        |
\_______________________________/


Checkbox Validation 1.1 © 2012
------------------------------
Author: Vernier
Compatibility: 1.6.X
Support: http://vernier.me
Description: Checkbox Validation adds a validation check in four different locations: New Threads, New Replys, New Private Message and Registration. A random number is generated and the user must select the correct checkbox in order to proceed. If the user enters the wrong checkbox, an error message tells the user they've entered the incorrect number and the action is not performed. Each individual location can be disabled via the settings in the Admin Control Panel, or all locations can be disabled via the settings in the Admin Control Panel. You can also specify which usergroups do not need to enter the checkbox validation and you can allow members to only enter the validation once, however guests, banned and awaiting activation users must enter the checkbox validation every time, regardless of if they have already validated as a user.

NB: Please do not leave support querys in the reviews; I cannot contact you via the reviews, therefore will be unable to assist you. If you require support, please contact me: http://vernier.me


License:
--------
-> Allowed to Use
-> Allowed to Modify
-> Not Allowed to Distribute


Files Included In This Download:
--------------------------------
Upload:

 -> Upload/inc/languages/english/checkboxvalidation.lang.php
 -> Upload/inc/plugins/checkboxvalidation.php

Documentation:

 -> Documentation/Changelog.txt
 -> Documentation/ReadMe.txt
 -> Documentation/License.txt
 -> Documentation/previews/incorrect_number_inline.png
 -> Documentation/previews/incorrect_number_popup.png
 -> Documentation/previews/new_reply.png
 -> Documentation/previews/new_thread.png
 -> Documentation/previews/private_message.png
 -> Documentation/previews/quick_reply.png
 -> Documentation/previews/register.png
 -> Documentation/previews/settings.png


How to Install & Activate Checkbox Validation:
------------------------------------
1. Upload the contents of the `Upload` Directory into your forum root.

2. Navigate to Admin Control Panel -> Configuration -> Plugins and search for Checkbox Validation. Click Install & Activate.

3. Navigate to Admin Control Panel -> Configuration -> Settings and search for Checkbox Validation.

4. Configure the settings by using the `Checkbox Validation Settings` guide below.


How to use Checkbox Validation:
-------------------------------
1. After Installing & Activating Checkbox Validation, Navigate to Admin Control Panel -> Configuration -> Settings -> Checkbox Validation

2. You can now configure these settings here. Please use the `Checkbox Validation Settings` guide below for a detailed description of what each of these settings do.

3. Now when a user trys to post a new reply, post a new thread, send a pm or register they will need to enter the checkbox validation in order to perform that action.


How to Disable Checkbox Validation:
-----------------------------------
1. Navigate to Admin Control Panel -> Configuration -> Settings and search for Checkbox Validation. Find: Do you want to enable Checkbox Validation? Set this to Off.


How to Deactivate Custom Board Offline Page:
--------------------------------------------
1. Navigate to Admin Control Panel -> Configration -> Plugins and search for Checkbox Validation. Click Deactivate.


How to Uninstall Custom Board Offline Page:
--------------------------------------------
1. Navigate to Admin Control Panel -> Configration -> Plugins and search for Checkbox Validation. Click Uninstall.


Checkbox Validation Settings:
-----------------------------
There are seven settings associated with Checkbox Validation. These are:

1. Do you want to enable Checkbox Validation?
 ____   _____
| On | | Off |
 ¯¯¯¯   ¯¯¯¯¯

2. Enable on every New Thread?
 _____   ____
| Yes | | No |
 ¯¯¯¯¯   ¯¯¯¯

3. Enable on every New Reply?
 _____   ____
| Yes | | No |
 ¯¯¯¯¯   ¯¯¯¯

4. Enable on every Private Message?
 _____   ____
| Yes | | No |
 ¯¯¯¯¯   ¯¯¯¯

5. Enable on the Register page?
 _____   ____
| Yes | | No |
 ¯¯¯¯¯   ¯¯¯¯

6. Usergroups that do not have to enter the Validation
 ______________________________
| 0                            |
 ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯

7. Registered members should only enter the Validation once?
 _____   ____
| Yes | | No |
 ¯¯¯¯¯   ¯¯¯¯

 Setting #1 is the global switch. It allows you to turn off every location of Checkbox Validation by simply setting it to Off. Alternatively, set it to on to enable Checkbox Validation.

 Setting #2 allows you to enable or disable the functionality of this plugin on every New Thread. Set it to yes to enable Checkbox Validation on every New Thread. Alternatively, set it to no to disable Checkbox Validation on every New Thread.

 Setting #3 allows you to enable or disable the functionality of this plugin on every New Reply. Set it to yes to enable Checkbox Validation on every New Reply. Alternatively, set it to no to disable Checkbox Validation on every New Reply.

 Setting #4 allows you to enable or disable the functionality of this plugin on every New Private Message. Set it to yes to enable Checkbox Validation on every New Private Message. Alternatively, set it to no to disable Checkbox Validation on every New Private Message.

 Setting #5 allows you to enable or disable the functionality of this plugin on the Registration Page. Set it to yes to enable Checkbox Validation on the Registration Page. Alternatively, set it to no to disable Checkbox Validation on the Registration Page.

 Setting #6 allows you to specify which usergroups do not have to enter the Checkbox Validation. To add more than one usergroup, please use a comma (e.g 1,2,3). Please bare in mind this also takes into consideration additional usergroups. To make every usergroup enter the Checkbox Validation, either enter 0 or leave the field blank.

 Setting #7 allows you to enable or disable the option where Registered members should enter the Checkbox Validation only once or every time. If you set this setting to yes, registered members only have to enter the Checkbox Validation once. If you set this setting to no, registered members have to enter the Checkbox Validation every time they perform an activated action. Guests, Banned and Awaiting Activation must enter the Checkbox Validation regardless of whether they've entered it before or not.