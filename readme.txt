/*** Get help for any command in git: for ex: help for 'stash' command ***/
git stash --help

/**** Create new branch from 'master' branch: currently we are in 'master' branch ****/
git branch new_feature

/*** Get what changes have been made in a file ***/
git diff <file-name>
git diff     /* It shows all files with their changes in current branch */

/**** merge new_feature branch into master branch: for it, go to master branch and type the following command ****/
git checkout master  //or 'git checkout -b master' -b for forcefully
git merge new_feature

/**** After successful merging, delete new_feature branch ****/
git branch -d new_feature     [-d is an alias for --delete]
git branch -D new_feature     [-D is an alias for --delete --force, use if branch new_feature is un-merged to it's upstream branch(for ex: master branch)]

/*** Delete a branch from remote/github, totally independent of delete the same branch from local. 
Means we can delete the branch from remote repository first then if we want, can delete the same branch from local as well. Vice versa is also true. ***/
git push <remote-name> --delete <branch-name>           [If <branch-name> has been merged in in's upstream branch]
git push <remote-name> --delete --force <branch-name>   [If <branch-name> is un-merged]
/* For ex: git push origin --delete mybranch */

/**** after git initialization i.e. 'git init' command, use following ****/
git remote add origin https://github.com/jitendrakyadav/hello-world.git

/**** If origin is not updated after firing above command again and again, then remove origin first & then use above command ****/
git rm origin

/**** output: origin ****/
git remote

/**** Pull from server readme-edits to local machine readme-edits, execute following command, when you are in readme-edits branch ****/
git pull origin readme-edits

/**** Push from local machine readme-edits to server readme-edits, execute following command, when you are in readme-edits branch ****/
git push origin readme-edits

/**** Display commits log [last 6] ****/
git log -6

/**** revert(पूर्वस्थिति में लौटना) to a particular commit in middle i.e. there are some commits above and below ****/
git revert <commit-id>

/**** revert to a merge commit ****/
git revert <commit-id> -m 1   //or 2 [1 or 2 is parent to which we want to return while preserving afterwards commits. Look into Git copy and print-screens on github]

/**** revert to just previous(last) commit ****/
git revert HEAD

/**** Take the branch(into past really) to a previous commit and update the same remote branch also. Make a branch from prev branch and do all these things there and remain safe the prev branch ****/
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
4. First developer realizes their mistakes and remove last 2 commits and push forcefully the same on branch.
5. Now for 1st developer and remote repository, the last commit on this branch is commit-1.
6. Now again second developer got pull and see conflicts, he resolves the conflict and commit the code with commit-id commit-4
7. For second developer commits on branch are commit-1, commit-2, commit-3, commit-4
8. Second developer pushes their new commits on remote repository and same pulled by first developer.
9. Now remote repository and first developer have the same commits as second developer i.e. commit-1, commit-2, commit-3, commit-4.
10. So conclusion is, to remove their mistakes what first developer did, again trapped in the same situation.
