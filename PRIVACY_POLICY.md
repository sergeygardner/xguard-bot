# Privacy Policy for XGuardChatBot

#### Effective Date: 01 August 2023

Self-employed private entrepreneur/XGuardChatBot ("we," "our," or "us") operates the XGuardChatBot console application (
the "App"). This Privacy Policy outlines how we collect, use, disclose, and protect the personal information of users ("
User," "you," or "your") of the App.

### Information We Collect

- A user id. A public identification number of a Facebook user gathered from the Facebook graph API. For more
  information, see [the page](https://developers.facebook.com/docs/graph-api/reference/user/) and the section 'Fields'
  and the row 'id'. We use that id for understanding from which channel we need to get messages.
- A post id. A public identification number of a post from a Facebook page gathered from the Facebook graph API. For
  more information, see [the page](https://developers.facebook.com/docs/graph-api/reference/post) and the section '
  Fields' and the row 'id'. We use that id to avoid duplicating messages in the database.
- A message from a post. A post from a Facebook page gathered from the Facebook graph API. For more information,
  see [the page](https://developers.facebook.com/docs/graph-api/reference/post) and the section 'Fields' and the row '
  message'. We use that field to store a text and to transfer a text to Telegram as a message.

### How We Use Your Information

The App uses information to transfer messages (see collected information 'A message from a post') to certain registered
channels in Telegram.
We are not shared or used information for any other purposes.

### How We Share Your Information

In no way. We are not selling, renting, or otherwise disclosing user information to third parties.

### Cookies and Similar Technologies

The App doesn't use any cookies or similar technologies.

### Third-Party Services

The App uses a connector to Telegram and transfer messages (see 'A message from a post') from certain users to certain
registered channels. It depends
on how the App was configured. See [the page](./README.md) for information about configurations.

### Your Choices

The App doesn't provide any direct methods to update, delete or use gathered information.
Facebook's users must write to the Facebook's support team and claim for updating,
deleting or using gathered information from their accounts.

### Security

- The App doesn't have any external interfaces because it is only a console application.
  An intruder must have a private key and IP-address to get to the server where the App is running.
- The App runs via docker which one uses their [own security policy](https://docs.docker.com/engine/security/).
- The App uses PostgreSQL for storing data.
  You can read
  their [documentation](https://www.postgresql.org/docs/current/index.html) to understand their security policy.
- You can read Telegram [privacy policy](https://telegram.org/privacy)

### Children's Privacy

In no way.
For using the App is needed
to get access
to [the advanced user_posts permission](https://developers.facebook.com/docs/permissions/reference/user_posts/).
To get the permission is needed to verify business in Facebook
and review the App. In that case the App is suitable only for certain companies or individuals and not suitable for
children under 18-year-old.

### Changes to This Privacy Policy

Any changes in this policy will be published via GitHub and can be gathered from [the page](./PRIVACY_POLICY.md).
There is no way to notify or to request acceptance.

### Contact Us

Any contacts are available on [the main page](https://github.com/sergeygardner) of the author.
To read the full Privacy Policy, please visit: [privacy policy](./PRIVACY_POLICY.md)

By using the XGuardChatBot App, you acknowledge that you have read and understood this Privacy Policy and agree to its
terms.
