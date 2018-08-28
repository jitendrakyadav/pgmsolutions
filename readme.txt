/*** Get help for any command in git: for ex: help for 'stash' command ***/
git stash --help

/*** Create new branch from 'master' branch: currently we are in 'master' branch ***/
git branch new_feature

/*** Get what changes have been made in files from last commit which are in stage-1 i.e. working folder in current branch. Newly created files(i.e. "Untracked files" from git repository, means those who were never part of git repository yet) would be excluded from this list(as the files are new, so need not to use "git diff" to get differences from previous version of the same files). ***/
git diff
/* Get what changes have been made in a file from last commit, where <file-name> is in stage-1 i.e. working folder. Newly created files(i.e. "Untracked files" from git repository, means those who were never part of git repository yet) would not be eligible for this command(as the whole file is new, so need not to use "git diff" to get difference from previous version of the same file). */
git diff <file-name>
/* Shows only file names, not code differences */
git diff --name-only
/* Get what changes have been made in files from last commit which are in stage-2 i.e. staging area in current branch. Newly created files which are going to be introduced to git repository now and are in stage-2, would be listed hear as well. */
git diff --cached
/* Get what changes have been made in a file from last commit which are in stage-2 i.e. staging area in current branch. Newly created files which are going to be introduced to git repository now and are in stage-2, would be eligible for this command. */     
git diff --cached <file-name>
/* Shows only file names, not code differences */
git diff --cached --name-only

/*** merge new_feature branch into master branch: for it, go to master branch and type the following command ***/
git checkout master  //or 'git checkout -b master' -b for forcefully
git merge new_feature

/*** After successful merging, delete new_feature branch ***/
git branch -d new_feature     [-d is an alias for --delete]
git branch -D new_feature     [-D is an alias for --delete --force, use if branch new_feature is un-merged to it's upstream branch(for ex: master branch)]

/*** Delete a branch from remote/github, totally independent of delete the same branch from local. 
Means we can delete the branch from remote repository first then if we want, can delete the same branch from local as well. Vice versa is also true. ***/
git push <remote-name> --delete <branch-name>           [If <branch-name> has been merged in in's upstream branch]
git push <remote-name> --delete --force <branch-name>   [If <branch-name> is un-merged]
/* For ex: git push origin --delete mybranch */

/*** after git initialization i.e. 'git init' command, use following ***/
git remote add origin https://github.com/jitendrakyadav/hello-world.git

/*** If origin is not updated after firing above command again and again, then remove origin first & then use above command ***/
git rm origin

/*** output: origin ***/
git remote

/*** Pull from server readme-edits to local machine readme-edits, execute following command, when you are in readme-edits branch ***/
git pull origin readme-edits

/*** Push from local machine readme-edits to server readme-edits, execute following command, when you are in readme-edits branch ***/
git push origin readme-edits

/*** Display commits log [last 6] ***/
git log -6

/*** revert(पूर्वस्थिति में लौटना) to a particular commit in middle i.e. there are some commits above and below ***/
git revert <commit-id>

/*** revert to a merge commit ***/
git revert <commit-id> -m 1   //or 2 [1 or 2 is parent to which we want to return while preserving afterwards commits. Look into Git copy and print-screens on github]

/*** revert to just previous(last) commit ***/
git revert HEAD

/*** Take the branch(into past really) to a previous commit and update the same remote branch also. Make a branch from prev branch and do all these things there and remain safe the prev branch ***/
git reset --hard <commit-id>
git push origin -f <branch-name>

/*** Show details of a commit-id: modified files list, changes made line by line, auther name  ***/
git show <commit-id>
git show --stat <commit-id>               /* Show less details of a commit-id: modified files list, author name */
git show --stat --oneline <commit-id>     /* Show very less details of a commit-id: modified files list only */

/*** cloning a remote repository ***/
git clone <remote-repository-url>      
/* for ex: git clone https://github.com/jitendrakyadav/ci226.git :It will create a directory(in your current directory) ci226 containing all files with master branch */

git clone <remote-repository-url> <directory-path>    
/* for ex: git clone https://github.com/jitendrakyadav/ci226.git /var/www/html/2018/myjitu/ :It will download all files for your repository in current directory without creating any new directory with master branch */

git branch -a
/* 
1. Initially when you clone a repository on local, it shows all files with master branch by default.  
2. "git branch" will show only master branch this time, but local repository contains all branches history as remote repository.
3. As told, it contains only history, not contains all other branches with their files physically present there.
4. "git branch -a" will show you all branches using their history, rather than showing only master
5. "git checkout <any-other-branch-excluding-master>" git will create this branch and add/create files in appropriate folders related to this branch using their history for you.
6. It means - on cloning, git only provides you master branch with master branch related files-only. Git does so to escape/remove unwanted files-overhead. But at the same time, git provides you history of all other branches as well. So when you need, just checkout to other branch, git will provide/generate all files related to that branch with branch itself using their local history present in .git directory without internet connection for now.  
*/

git fetch    
/* update your local git history only from remote history, not create your absent branches and their files. But as history is updated, we can use "git branch -a" to see absent/hidden branches and just need to checkout to absent branches and let git create you absent branch and associated files with branch using their history */
/* Difference between "git fetch" & "git pull": fetch update your local git history only but pull update local git history, update/merge/create files at the same time within your branch. Remember, use "git pull" only when your are within your branch and want to up-to-date that branch with remote-branch */

/*** 
There are 4 states for a file  
1. Working Folder          [a file with new changes]
2. Staging Area            [when "git add" command has been used for the file with their changes]
3. Local Repository        [when "git commit" command has been used for changes, i.e. now changes has been recorded in local .git folder]
4. Remote/Git Repository   [when "git push" command has been used, i.e. now commit has been recorded on github in remote .git folder]
For visualation graphically the above 4 stages, look into drive for doc on git
***/
git checkout -- <file-name>
git checkout -- .              /* For all modified files */
/* This command is for a file in stage-1. This command sends a file from stage-1 to the same stage-1, but removes all changes made in file previously */

git reset HEAD <file-name>
git reset HEAD                 /* For all modified files */
/* This command sends a file from stage-2 to stage-1, but preserves all changes made in file previously */
/* Difference between "git reset --hard <commit-id>" and "git revert <commit-id>": revert ceates 
a new commit-id, preserves all previous commit-ids, take the application(files) exact to just 
previous commit-id state before the mentioned commit-id but under the new generated commit-id. 
While reset erases all previous commit-ids along with their history and points the git head exactally 
to mentioned commit-id */

/*** Stash: छुपा कर रखना: Stashing takes the dirty state of your working directory i.e.your modified tracked 
files and stashes changes, means saves it on a stack of unfinished changes that you can reapply at any time ***/
git stash save "<stash-name>"
git stash save -a "<stash-name>"     [Stashes all files including untracked(newly created) files, 
tracked(modified) files and git-ignored files as well]
git stash save -p                    [Provide option to stash in chunks of code]

git stash list                       [List all stashes] 
Ex: stash@{0}: On my-branch-name: <stash-name>

git stash apply <stash-unique-id>    [re-create the older environment with modified/created files] 
Ex: git stash apply stash@{0}

git stash drop <stash-unique-id>     [To clear "git stash list" one by one]
git stash clear                      [To clear all "git stash list" in one single command] 

git stash pop                        
/* 
Important points:
1. It re-creates your very-recent older environment with modified/newly-created fies in current branch
2. Drop(or delete) the used stash here at the same time 
3. "git stash" command saves changes from different-different branches in a stack
4. So most recent-one is saved under stash@{0}, older in stash@{1}, more older in stash@{2} in stack, and so on.
5. Here stash@{0} might be from branch-1, stash@{1} from branch-3 and stash@{2} from branch-n 
   and all these stashes would be stored in single/same stack, as there is only one stack for one repository.
6. It's possible to use "git stash save" in one branch and use "git stash pop" in another branch. 
   This means "git stash" is movable from one branch to another in same repository.
7. Video tutorial: https://youtu.be/KLEDKgMmbBI
*/

/*** There is each user-specific .gitconfig files, stored in user's home directory which contains user's git related global information, like produced by commands "git config --global user.name" & "user.email" to be used in user's all repositories/projects globally ***/
vim ~/.gitconfig         /* To view the user's personal global git-config file */

/*** To ignore files in your repository, create a .gitignore file or modify already created .gitignore file, write rules there to ignore files, one rule one separate line ***/
vim .gitignore           
/* Important points:
1. Rules might be like "*.tmp" in one line to ignore all tmp files, in another line "*.log" or "*.txt" or "xyz.txt" to 
   ignore all log or txt files or only xyz.txt file 
2. Ignore files might be:
   a. Related to your operating-system specific - for linux some .tmp files automatically created there, need to esclude from git repository.        In other collaborator case for same repository it might be windows & mac.
   b. Environment specific - like .netbeans folder mainly created due to your editor Netbeans, in other collaborator case it might be Eclipse
   c. Application specific - like .log files purely generated due to your unit-test/newly-developed-module newly-created log file or contents        modified in your already generated log files
3. A file/folder which is already part of your repository, could never be ignored through your .gitignore file; for ex: a file that is committed & pushed to remote repository, or only committed or currently in staging area(means "git add" has fired for that file) but not committed yet.
4. If still you want to ignore a file which is already part of your git repository - exclude/remove that file from your git repository i.e. use "git rm <file-name>", commit & then push normaly/forcefully, it would remove/delete that file from your remote repository. If you have not used "rm <file-name>" yet, that file will be still present in your project directory but in "working folder" area and now you may ignore this file through your .gitignore file.
*/

/*** If you don't want to use or create .gitignore file to ignore files, there is another way to ignore files. Use following file already present in "local repository" has equally same effect as .gitignore ***/
vim .git/info/exclude      /* write your rules here to ignore files just as in .gitignore file. Assume as "exclude" file is in repository/project root directory and use relative path to write rules there to ignore files. For ex: a file xyz.txt present in repository/project root directory, write rule just "xyz.txt" in "exclude" file to ignore the same. */

/*** 3rd way to ignore files, if you don't want to create .gitignore file or don't want to modify already created .gitignore file or don't want to use .git/info/exclude. Use following steps: ***/
1. vim ~/.gitignore    /* create a .gitignore file in your(user's) home directory */
2. git config --global core.excludesfile ~/.gitignore 
/* Make this .gitignore file global/common to be used for every git-repository/project of that user */
3. Here in ~/.gitignore, write your common rule like "*.txt" or "*.log" that would applicable equally for all your repositories. One tricky things we can do here, write a rule here to ignore .gitignore file and then create a .gitignore file in each repository and then you may create different-different rule for your different repositories. Remember, if you use your already created repository's .gitignore file, that must not be already part of your git-repository otherwise it will not work i.e. your repository's .gitignore file would not be ignored by your global ~/.gitignore file.

/*** Don't use same branch for 2 developers: case study ***/
1. Two developers using same branch ldap_upgrade_work. 
2. First developer added 3 commits one by one commit-1, commit-2, commit-3 and push the same on remote repository.
3. second developer before starting their work pull branch for latest update and got all 3 commits added by first developer.
4. First developer realizes their mistakes(suppose he added live ftp-credential in commit-2) and remove last 2 commits and push forcefully the same on branch.
5. Now for 1st developer and remote repository, the last commit on this branch is commit-1.
6. Now again second developer got pull and see conflicts, he resolves the conflict and commit the code with commit-id commit-4
7. For second developer commits on branch are commit-1, commit-2, commit-3, commit-4
8. Second developer pushes their new commits on remote repository and same pulled by first developer.
9. Now remote repository and first developer have the same commits as second developer i.e. commit-1, commit-2, commit-3, commit-4.
10. So conclusion is, to remove their mistakes what first developer did, again trapped in the same situation.

/*** Important facts about Git ***/
1. Every repository/project has a default status/position of files situated within it.
2. This default status/position of files in a repository/project, is called "default branch".
3. Github/Git, by default, set master branch(the first branch created automatically by Git in any repository) as their default branch.
4. master branch is the default branch in git and could never be deleted.
5. Steps to delete the master branch: create another branch, make it default branch on github, and then you may delete the master.
6. Each branch in repository shows the status of all files present in repository independently.
7. Even not dependent on master, from which it has been created. 
8. Even if you delete master branch it will not affect in any form to the newly created branch from master.

9. A branch consists of a no. of commits. But when you use "git log" to view current branch commits, It shows not only current branch commits but also it's parent branches commits as well (till "master" branch).
10. "master" branch is the base/top-most-parent branch of all branches available in the repository. 
11. To have more clarity on git branches and their commits flow, look into git_branches_and_their_commits_flow.pdf.

/*** Find the git commits, that introduced a string or removed the string in current branch ***/
git log -S "Hello World!"
/** Find the git commits, that introduced a string or removed the string in any branch of repository **/
git log -S "Hello World!" --all           /* --all option: search all branches of repository */
or
git log -S "Hello World!" --source --all

/*** Get a particular file change-log/history in current branch (current branch includes current-branch-commits & it's parent branches commits as well) ***/
gitk <file-name>   /* gitk is a very powerful GUI tool of git. It actually does really useful things that just cannot be done in a CLI. */
/** Get a particular file change-log/history through out all branches, present in repository **/
gitk --all <file-name>
/** If a file renamed for ex: from about.php to about_current.php then "gitk about_current.php" will show logs only about about_current.php, not about.php. So to get log of about_current.php and about.php (i.e. all logs of same file with current name and with all previous-names as well) as well, we need to use following commands: **/
gitk --follow <file-name>     /* gitk --follow about_current.php: will provide change-log for it and also about about.php(the same file but with it's all previous names) */
or
gitk --follow --all <file-name>

/*** About .git directory ***/
Git does not use delta storage, It uses snapshot storage. Each commit takes a full snapshot of your entire working directory. If a file is unchanged in a commit then git stores the previous commit reference only for that file, not the whole file.
In .git folder, there are 5 main sub-folders:(use unix command "find .git" to see each and every file/folder inside .git)
1. hooks
2. info => contains "exclude" file to write git-ignore rules there to make files/folders gitignore.
3. logs => store branches like refs/heads/master, refs/heads/branch_1, etc. 
4. objects 
   a. Here git stores their data in form of objects having unique ids. There are 4 object types of git - commit, tree, blob, tag. 
   b. Please have a look on object_types_&_their_association_in_git.png to get more clarity on git object types and their association to one another.
   c. blob => when you fire "git add <file-name>", git creates a blob(binary large object) object type with a unique-id, one blob object for one file, means if there are 3 files added then there would be generated 3 blob objects corresponding to each file. This blob object contains the file contents.
   d. tree => This object type creates when you fire 'git commit -m ""' command. It contains directory listing information for all files and folders present in repository.
   e. commit => This object type creates when you fire 'git commit -m ""' command. It contains commit information - it's unique-id, commit-message, parent-commit id, commit-created date/time, author, committer.
5. refs => store branches information for local and remote both like heads/branch_1, heads/branch_2, remotes/origin/HEAD, etc.

To get object type using object-type-id situated in .git/objects/ like .git/objects/e9/65047ad7c57865823c7d992b1d046ea66edf78, use following command:
git cat-file -t <object-type-unique-id>    /* add folder-name & it's file-name to get object-type-id */     
git cat-file -t e965047ad7c57865823c7d992b1d046ea66edf78   
/* 'e9' + '65047ad7c57865823c7d992b1d046ea66edf78' = e965047ad7c57865823c7d992b1d046ea66edf78 */
Output: blob
