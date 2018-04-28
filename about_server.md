####It seems that the server's `MongoDB` will automatically turned off 30 minutes after it is started. So here are instructions to access the server:

- Go to the directory where you place the `.pem` file I gave you

- Open terminal, type in `ssh -i "itws4500.pem" ec2-user@ec2-54-158-25-237.compute-1.amazonaws.com`

- After you see:
    ```       
                     __|  __|_  )
                     _|  (     /   Amazon Linux AMI
                    ___|\___|___|
    ```
    , you are successfully connected to our server.

- Type in `itws` to go to our project directory

- Or type in `mongod` to start `MongoDB`

