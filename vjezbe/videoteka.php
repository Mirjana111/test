USE [master]
GO

/****** Object:  Database [Videoteka]    Script Date: 16.1.2013. 23:10:55 ******/
CREATE DATABASE [Videoteka]
GO

USE [Videoteka]
GO

/****** Object:  Table [dbo].[izdavanja]    Script Date: 16.1.2013. 23:08:45 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[izdavanja](
	[iznajmljivanjeID] [int] NOT NULL,
	[kupacID] [int] NOT NULL,
	[kasetaID] [int] NOT NULL,
	[DatumUzimanja] [smalldatetime] NOT NULL,
	[DatumVracanja] [smalldatetime] NULL,
	[Placeno] [nchar](10) NULL,
 CONSTRAINT [PK_izdavanja] PRIMARY KEY CLUSTERED 
(
	[iznajmljivanjeID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

USE [Videoteka]
GO

/****** Object:  Table [dbo].[kasete]    Script Date: 16.1.2013. 23:10:17 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[kasete](
	[kasetaID] [int] NOT NULL,
	[Naziv] [nvarchar](50) NOT NULL,
	[Glumci] [nvarchar](50) NOT NULL,
	[Rezicer] [nvarchar](50) NOT NULL,
	[Trajanje] [time](7) NOT NULL,
 CONSTRAINT [PK_kasete] PRIMARY KEY CLUSTERED 
(
	[kasetaID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

USE [Videoteka]
GO

/****** Object:  Table [dbo].[kupci]    Script Date: 16.1.2013. 23:10:33 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[kupci](
	[kupacID] [int] NOT NULL,
	[ImePrezime] [nvarchar](50) NOT NULL,
	[Telefon] [nchar](20) NOT NULL,
	[lk] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_kupci] PRIMARY KEY CLUSTERED 
(
	[kupacID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO