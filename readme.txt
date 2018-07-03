/**** Create new branch from 'master' branch: currently we are in 'master' branch ****/
create branch new_feature

/**** merge new_feature branch into master branch: for it, go to master branch and type the following command ****/
git checkout master  //or 'git checkout -b master' -b for forcefully
git merge new_feature

/**** After successful merging, delete new_feature branch ****/
git branch -d new_feature

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
