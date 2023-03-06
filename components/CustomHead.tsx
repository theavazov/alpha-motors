import Head from "next/head";

type Props = {
  title: string;
  description?: string;
};

export function CustomHead({ title, description }: Props) {
  return (
    <Head>
      <title>{title}</title>
      <meta
        name="description"
        content={description ? description : "Some description"}
      />
      <link rel="icon" href="/favicon.png" />
    </Head>
  );
}
