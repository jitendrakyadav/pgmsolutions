/**** Create new branch from 'master' branch: currently we are in 'master' branch ****/
create branch new_feature

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
git show --stat <commit-id>     /* Show less details of a commit-id: modified files list, author name */
git show --stat <commit-id>     /* Show very less details of a commit-id: modified files list only */

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
git checkout <file-name>
git checkout .              /* For all modified files */
/* This command is for a file in stage-1. This command sends a file from stage-1 to the same stage-1, but removes all changes made in file previously */

git reset HEAD <file-name>
git reset HEAD                 /* For all modified files */
/* This command sends a file from stage-2 to stage-1, but preserves all changes made in file previously */
/* Difference between "git reset --hard <commit-id>" and "git revert <commit-id>": revert ceates a new commit-id, preserves all previous commit-ids, take the application(files) exact to just previous commit-id state before the mentioned commit-id but under the new generated commit-id. While reset erases all previous commit-ids along with their history and points the git head exactally to mentioned commit-id */


