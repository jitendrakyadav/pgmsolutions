/*** Get help for any command in git: for ex: help for 'stash' command ***/
git stash --help

/*** Create new branch from 'master' branch: currently we are in 'master' branch ***/
git branch new_feature




/***
 * Git tag - Tagging
 *
 * Reference: https://git-scm.com/book/en/v2/Git-Basics-Tagging
 */
Git has the ability to tag specific points (commit or commit-id like "90c95ab0d787cf83e5cadfa30145f10b88eccf7d") 
in a repository’s history. 
Mainly, people use this functionality to mark release points (v1.0, v2.0 or 1.0.0, 1.1.0, 1.1.1 and so on).
It acts like a pointer i.e. a particular git tag points to a particular commit-id.

Difference between git tag vs branch:
The difference between tags and branches are that a branch always points to the top of a development 
line (i.e. the last commit) and will change when a new commit is pushed whereas a tag will not change. 
Thus tags are more useful to "tag" a specific version and the tag will then always stay on that version 
if we don't change it manually.

/* Create Tag */
There are 2 types of tags: But we have to create our tag always in annotated way.
1. Lightweight Tags: 
   A. Tag creation syntax:
         git tag <version-no>
	 git tag 1.1.0		/* It will pick the last commit-id in the current branch to tag */

	 git tag <version-no> <commit-id>
	 git tag 1.2.1 59f7ac2f2104707de98da69704ae483343546ae0
   B. A lightweight tag is very much like a branch that doesn’t change — it’s just a pointer to a specific commit. 
   C. It just keep the information about attached commit i.e. what is commit-id, commit's author name, mail-id, 
      it's creation date-time, commit message and what changes have been made in that particular commit.
      Please look/observe following print-screens:
         a. what-information-a-lightweight-tag-keep.png
	 b. what-information-a-git-show-commit-id-keep.png
      Here we can easily see, lightweight tag keep information just about attached commit-id, nothing else.
   D. But it doesn't keep information about it's own i.e. who has created the tag (author name), his mail-id, 
      tag creation date-time, tag creation message/comment.

2. Annotated Tags:
   A. Tag creation syntax:
         git tag -a <version-no> -m "<some tag message or comment>"	/* Here -a denotes for annotation */
	 git tag -a 1.2.2 -m "Version 1.2.2 released"	/* It will pick the last commit-id in the current branch to tag */

	 git tag -a <version-no> <commit-id> -m "<some tag message or comment>"
	 git tag -a 1.2.3 59f7ac2f2104707de98da69704ae483343546ae0 -m "Version 1.2.3 released"
   B. Annotated tag is stored as a full object in the Git database. 
   C. It keeps the information which a lightweight tag has, additionally it contains all information about 
      tag as well, like tagger name, his email, tag creation date-time & tag message/comment.	   
      Example: what-information-a-annotated-tag-keep.png



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
or
/**
 * The --no-ff flag causes the merge to always create a new commit object, even if the merge could be 
 * performed with a fast-forward. 
 * This avoids losing information about the historical existence of a feature branch and groups together all 
 * commits that together added the feature.
 *
 * Reference: https://nvie.com/posts/a-successful-git-branching-model/
 */
git merge --no-ff new_feature

Case Study: 
1. I have created a readme.txt file in master branch.
2. Open readme.txt file and added in first line "Hi", save file, added in git and then commit the same. 
   Let's assume commit-id is here "commit-1"
3. Open readme.txt file and added in second line "Jitendra", save file, added in git and then commit the same. 
   Let's assume commit-id is here "commit-2"
4. Open readme.txt file and added in third line "Kumar", save file, added in git and then commit the same. 
   Let's assume commit-id is here "commit-3"
5. Open readme.txt file and added in fourth line "Yadav", save file, added in git and then commit the same. 
   Let's assume commit-id is here "commit-4"
   Open readme.txt file, it's content is as following:
      Hi
      Jitendra
      Kumar
      Yadav

6. Created another branch "second_branch" from this master branch. 
7. Open readme.txt file and added in fifth line "How", save file, added in git and then commit the same. 
   Let's assume commit-id is here "commit-5"
8. Open readme.txt file and added in sixth line "are", save file, added in git and then commit the same. 
   Let's assume commit-id is here "commit-6"
9. Open readme.txt file and added in seventh line "you", save file, added in git and then commit the same. 
   Let's assume commit-id is here "commit-7"
   Open readme.txt file, it's content is as following:
      Hi
      Jitendra
      Kumar
      Yadav
      How
      are
      you

10. Now checkout to branch master again by using following command:
      git checkout master
    remember, here are total 4 commits and last one is "commit-4" and readme.txt content is:
      Hi
      Jitendra
      Kumar
      Yadav

11. Now merge second_branch in master using command as following:
    git merge second_branch
12. Now observe master branch:
    Total no of commits is still 4 and still last commit id in this branch is "commit-4"
    and readme.txt content is now:
      Hi
      Jitendra
      Kumar
      Yadav
      How
      are
      you

    This means - second_branch merged into master but no separate new merge commit id has been 
    created i.e. now "commit-4" denotes last changes in master branch as well as merged second branch changes. 
    Forget 11th and 12th points as above, let's consider a different case:
11. Now merge second_branch in master using command as following:
      git merge --no-ff second_branch
12. Now observe master branch:
    Total no of commits is now 7 and the last commit id in this branch after merging is "commit-7"
    and readme.txt content is now:
      Hi
      Jitendra
      Kumar
      Yadav
      How
      are
      you

    This means - second_branch merged into master and all commits of second_branch are preserved 
    in master branch i.e. this time not all changes of second_branch (i.e. "commit-5", "commit-6", 
    "commit-7") are merged on last commit of master branch "commit-4" although these all 3 new commits 
    are preserved separately in master branch while merging.
    Advantage: When merge using "--no-ff", and if there emerges some major issue in master branch after 
    merging, we can remove changes of second_branch easily from master branch by setting HEAD again on 
    "commit-4" by using command as following:
      git reset --hard commit-4


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
git remote rm origin

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

/*** List all tags of the repository ***/
git tag -l
/* Checkout to a specific tag */
git checkout tags/<tag-name>

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
3. The default branch is considered the “base” branch in your repository, against which all pull requests and code commits are automatically made when you don't specify a different branch.
4. Github/Git, by default, set master branch(the first branch created automatically by Git in any repository) as their default branch.
5. master branch is the default branch in git and could never be deleted.
6. Steps to delete the master branch: create another branch, make it default branch on github, and then you may delete the master.
7. Each branch in repository shows the status of all files present in repository independently.
8. Even not dependent on master, from which it has been created. 
9. Even if you delete master branch it will not affect in any form to the newly created branch from master.

10. A branch consists of a no. of commits. But when you use "git log" to view current branch commits, It shows not only current branch commits but also it's parent branches commits as well (till "master" branch).
11. "master" branch is the base/top-most-parent branch of all branches available in the repository. 
12. To have more clarity on git branches and their commits flow, look into git_branches_and_their_commits_flow.pdf.
13. Sometime, when we pull a branch to our local, we got a ton of files in working-folder i.e. in non-staging area. These files have not any content-change but only file-mode change like from 644 to 755 or vice versa. To remove these type of problems i.e. showing git-repository files in changed/modified state due to only file-mode changes of files not in content, use following command while you are in your project/repository's root directory:
    git config core.filemode false
    By-default, this setting is "true" that's why git shows change in file, even only if file-mode changes, not content.
14. Git parameters could have 3 different scopes. You can see this by running command "git config --list --show-origin" instead of "git config --list" [Screenshot from window machine: git-parameter-value-scope.jpg]:
    	a. Local Scope: In this scope, git parameters are set at your repository level & is controlled by your repository's .git directory: 
		git config core.autocrlf false
	b. Global Scope: In this scope, git parameters are set at user's level means this scope value of a git parameter would be applicable for all repositories of that user. It is controlled by User's home directory's .gitconfig file value.
		git config --global core.autocrlf true
		/* .gitconfig location */
		~/.gitconfig
		/home/<your-user-name>/.gitconfig       /* In Ubuntu  */
		/c/Users/<your-user-name>/.gitconfig    /* In Windows */
	c. System Scope: When Git installs in your system/machine/server, It has system-level value for git parameters and would be applicable for all Users existing on that system.
	For a git parameter, it's local scope value has highest priority. Scope priority is as following:
	Local Scope > Global Scope > System Scope
	Note: .gitattributes file (if presents in repository/project's-root-directory) would override even git parameter's local scope value. 
15. In your project collaboration work, if one employee is using Windows OS, other Linux and another one is using Mac OS i.e. project members are using different OS then to avoid to git consider "modified/changed files" only due to different new-line characters in different OS, create file .gitattributes in your project root directory, might be with following contents:
	* text=auto
	*.css linguist-vendored
	*.scss linguist-vendored
You might consider repository mg226's .gitattributes file as well.

/*** Find the git commits, that introduced a string or removed the string in current branch ***/
git log -S "Hello World!"
/** Find the git commits, that introduced a string or removed the string in any branch of repository **/
git log -S "Hello World!" --all           /* --all option: search all branches of repository */
or
git log -S "Hello World!" --source --all
/* Search in case-insensitive manner: I couldn't find any option available for case-insensitive search, but we can do the same by considering a reg-ex as search-string */
git log -G "[vV]irtual[ ]*[bB]ox" --source --all	
/* Use "git log --help", when manual/help opens, press character "h" & then scroll down and come to section "OPTIONS": Here -i => ignore-case but i never found how can we use it here; -G => HILITE-SEARCH */

Explanation: 
1. -G 	=> I found that using this, we can use regular-expression as search-string to search the whole repository
2. [vV] => 1st character should be either small "v" or capital "V"
3. [ ]* => There might be zero space or one space or more space
4. [bB] => There should be exactly one character & that might be either small "b" or capital "B"

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

/*** What happens when you clone a repository from github: let's take an example of magento2 repository - https://github.com/magento/magento2 ***/
1. Remember: If you want to contribute to a repository or make some development work for a repository, always use "git clone" command to get a copy of your remote repository to your local machine to start development work.
2. Don't use "git pull" command here in this particular case.
   case study:
   a. create a folder "test2" on my local machine.
   b. Enter inside the directory using cd command and fire command "git init".
   c. Fire command "git remote add origin https://github.com/<your-user-name>/test2.git"
   d. For information: test2 is a remote repository having four branches - mybranch, jitu2, jitu3, jitu4. Here, in this repository no any branch with name "master" and jitu2 is the default branch in this repository.
   e. Fire command "git pull origin jitu3" instead of "git clone" having a purpose to make a copy of remote on my local machine to start my development work for this repository.
   f. It creates a "master" branch on my local and put all files inside it which are available in branch jitu3 in my remote repository and not showing other branches even I fired command "git branch -a"[For this command, only showing master and 1 more branch i.e. jitu3].
   g. Fire command "git checkout jitu3", having same no of files with same changes as in master branch.
   h. Fire command "git fetch" to get any additional branch in between, as usually do in a collaboration development in git. 
   i. Fire command "git branch -a", it lists here now all branches available on remote for this repository including mybranch, jitu2, jitu4.
   j. Disadvantages of using "git pull" over "git clone" for first time to get a copy of remote repository to start their development work: Local repository created an extra useless branch named "master" while no any branch exist there on remote for this repository. If we leave this point, after doing this extra effort, local repository position are equivalent to a local repository position created by "git clone". For collaboration work, all branches must be there at local as on remote; this concept is wrong to keep only some branches on their local repository instead of all and even if you think this, this is not possible as "git fetch" would bring all branches(history) in your local repository as "git clone does initially".

/*** Download a-software/magento repository from github, choose version and make your own fresh/new github/remote repository to start their development work for magento ***/
1. When you fire:
   git clone https://github.com/magento/magento2.git magento2    
   /* Here magento2 is a directory in your local machine where you want to clone the remote repository */
2. Git clones magento2 repository in your local magento2 directory that includes .git directory as well.
3. You see at remote, there are 6 branches on github - master(assumed only to understand, as there is no any physical branch exists there in real with name "master" for this particular repository; also considering here this "master" as default-branch instead of 2.2-develop for this repository), 2.0, 2.1-develop, 2.1, 2.2-develop(In real, this is the default-branch for this repository. As there is a trick to know the default branch for any repository: when you click on a repository means when you reside on a URL like https://github.com/<your-user-name>/<your-repository-name> then which branch in drop-down menu is shown as selected, that is the default-branch for that repository), 2.2, 2.3-develop. Example: Laravel repository on github: https://github.com/laravel/laravel, in real, contains "master" branch as their default-branch.
4. But when you fire: "git branch" locally, only master branch is shown. 
5. Because clone(for first time, you must use clone command) brings history of all branches(stored in .git folder) but physically show only master branch with their files locally.
6. With command "git branch -a" you can see all available branches which are hidden currently in .git folder.
7. Just checkout to branch which you want, like I checkout to 2.2 branch as I needed it, now your local magento2 folder contains all files and folders which must be for magento version 2.2.
8. Now delete your local .git folder because you have achieved files/folders which you want.
9. Again fire "git init" - It assumes/initializes/treats your project as as fresh repository not connected to any remote repository yet.
10.1 If you fire "git branch", no any branch would shown here.
11. Now fire command "git branch -b mydefaultbranch" if you don't want to make master as your default branch.
12. Fire command "git add ." to add all your files to staging area. 
13.1 If you fire "git branch", no any branch would shown here.
14. Fire 'git commit -m ""' to send your files in stage-3 i.e. your local .git.
15. You see now - If you have created any branch like mydefaultbranch then this commit would be shown under this branch otherwise git automatically creates master as your default branch and register this commit under it.
16. Fire "git remote add origin https://github.com/<your-user-name>/<your-newly-created-remote-git-repository>.git" 
17. Fire "git push origin mydefaultbranch/master" to push your mydefaultbranch or master branch to your newly created remote repository.
18. This initial/first branch which has been pushed to blank remote repository, would be considered/set as default-branch by remote repository.
   
/*** Delete a repository from github.com ***/
1. Go to github.com and login to your account.
2. Now click on repository which you want to delete, means now your URL must be like https://github.com/<your-user-name>/<your-repository-name>
3. In header section, click on "Settings" tab just after "Insights" tab.
4. Scroll the page to get the bottom of page - here the section "Danger Zone".
5. In under sub-section "Delete this repository" click on "Delete this repository" button
6. In pop-up, put your repository name again to confirm the same and then press the button.

/*** Get/Set default-branch of a repository on github.com ***/
1. Go to github.com and login to your account.
2. Now click on repository for which you want to know default-branch, means now your URL must be like https://github.com/<your-user-name>/<your-repository-name>
3. In header section, click on "Settings" tab just after "Insights" tab.
4. In the left menu, click "Branches" tab.
5. Here you can see/set your repository default branch.

