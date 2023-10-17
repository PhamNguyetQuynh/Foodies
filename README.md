# Foodies
IS207 final project
<br />
<br />
## IMPORTANT RULES: 
-Commit often so that our professor can see we worked hard <br />
-ONE branch for ONE feature <br />
-ALWAYS make sure to CREATE new branch FROM DEVELOP branch (NOT from MASTER) <br />
-ALWAYS do these steps below before making any changes <br />
```
git checkout develop
```
to switch to develop branch
```
git status
```
to make sure you are on develop branch

now it's is the most important part
```
git pull origin develop
```
to pull the newest changes from the develop branch
then you can add your code/make changes.

## 1. How to works with this repo

- **Step 1. Clone this repo (if not yet)**
Https method 

  ```
  git clone https://github.com/PhamNguyetQuynh/Foodies.git
  ```
- **Step 2. Make sure you are in develop branch**

  ```
  git branch
  ```
  NOTE: If the current branch is not develop then you can use the command below to switch to develop branch

  ```
  git checkout develop
  ```
  NOTE: Make sure that you are in the folder that has the .git folder, if not
  then you can use the command cd to change the directory to the folder that has the .git folder
  - **3. Create a new branch from develop branch**

  ```
  git checkout -b <your-branch-name>
  ```

  NOTE: The branch name should be related to the feature you are working on.

- **4. Start working on your branch and push it to remote when you finished some new feature or end of day**

  NOTE:For the first time you create a new branch and push it to remote do this

  ```
  git push -u origin <your-branch-name>
  ```

  After that you can push it with the shorter syntax

  ```
  git push
  ```

  NOTE: The -u flag help you to set up the upstream branch. After that, you can use git push without any flag.
- **5. Create a pull request to develop branch**
